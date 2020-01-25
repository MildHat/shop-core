<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use app\widgets\Brands\Brands;
use app\widgets\Categories\Categories;

class CategoryController extends AppController
{

    /** @var Product */
    public $product;

    /** @var Category */
    public $category;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->product = new Product();
        $this->category = new Category();
    }

    public function showAction()
    {
        try {
            $category = $this->category->select()->where([
                ['alias', '=', $this->route['alias']]
            ])->getOne();
        } catch (\Exception $e) {
            throw new \Exception('Page not found', 404);
        }

        $categories = new Categories();
        $brands = new Brands();

        $products = $this->product->select()->where([
            ['category_id', '=', $category->id]
        ])->get();

        return $this->view->render('category/show', compact('category', 'products', 'brands', 'categories'));
    }
}