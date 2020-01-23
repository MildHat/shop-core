<?php


namespace app\controllers;


use app\components\Pagination;
use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\widgets\brands\Brands;
use app\widgets\categories\Categories;
use core\App;

class ProductController extends AppController
{
    /** @var Product */
    public $product;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->product = new Product();
    }

    public function indexAction()
    {
        if (isset($this->route['page'])) {
            $page = (int) $this->route['page'];
        } else {
            $page = 1;
        }

        $articlesPerPage = App::$app->getProperty('pagination');

        $offset = Pagination::giveOffset($page, $articlesPerPage);
        $products = $this->product->giveProductsToPagination($articlesPerPage, $offset);

        $brands = new Brands();
        $categories = new Categories();

        $countOfProducts = $this->product->giveCountOfProducts();
        $amountOfPages = Pagination::giveAmountOfPages(
            $countOfProducts,
            App::$app->getProperty('pagination')
        );

        $this->setMeta('Shop');
        $this->set(compact('categories', 'brands', 'products', 'page', 'amountOfPages', 'countOfProducts', 'offset'));
    }

    public function showAction()
    {
        $product = $this->product->findOne($this->route['id']);
        $this->set(compact('product'));
    }
}