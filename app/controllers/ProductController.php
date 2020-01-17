<?php


namespace app\controllers;


use app\components\Pagination;
use app\models\Brand;
use app\models\Category;
use app\models\Product;
use core\App;

class ProductController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->category = new Category();
        $this->brand = new Brand();
        $this->product = new Product();
    }

    public function indexAction()
    {
        if (isset($this->route['page'])) {
            $page = (int) $this->route['page'];
        } else {
            $page = 1;
        }

        $offset = Pagination::giveOffset($page, App::$app->getProperty('pagination'));
        $products = $this->product->giveProductsToPagination($page, $offset, 'WHERE category_id = 1');
        $categories = $this->category->giveCategoriesWithAmountOfProducts();
        $brands = $this->brand->find();
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