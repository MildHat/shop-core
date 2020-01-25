<?php


namespace app\controllers;


use app\components\Pagination;
use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\widgets\Brands\Brands;
use app\widgets\Categories\Categories;
use app\widgets\RelatedProducts\RelatedProducts;
use core\App;
use core\Request;

class ProductController extends AppController
{
    /** @var Product */
    public $product;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->product = new Product();
    }

    public function indexAction(Request $request)
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

        return $this->view->render('product/index',
            compact('categories', 'brands', 'products', 'page', 'amountOfPages', 'countOfProducts', 'offset'));

    }

    public function showAction(Request $request)
    {
        try {
            $product = $this->product->select()->where([
                ['alias', '=', $this->route['alias']]
            ])->getOne();
        } catch (\Exception $e) {
            throw new \Exception('Page not found', 404);
        }

        $relatedProducts = new RelatedProducts($product->id);

        return $this->view->render('product/show', compact('product', 'relatedProducts'));

    }

    public function searchAction(Request $request)
    {

        if ($request->post('search', 'boolean')) {
            try {
                $products = $this->product->search($request->post('search'));
            } catch (\Exception $e) {
                $result = 'Nothing';
                return $this->view->render('product/search', compact('result'));
            }
            $brands = new Brands();
            $categories = new Categories();


            return $this->view->render('product/search', compact('products', 'brands', 'categories'));
        }



        $this->response->redirect();
    }
}