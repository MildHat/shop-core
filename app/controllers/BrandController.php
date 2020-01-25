<?php


namespace app\controllers;


use app\models\Brand;
use app\models\Product;
use app\widgets\Brands\Brands;
use app\widgets\Categories\Categories;

class BrandController extends AppController
{
    /** @var Product */
    public $product;

    /** @var Brand */
    public $brand;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->product = new Product();
        $this->brand = new Brand();
    }

    public function showAction()
    {
        try {
            $brand = $this->brand->select()->where([
                ['alias', '=', $this->route['alias']]
            ])->getOne();
        } catch (\Exception $e) {
            throw new \Exception('Page not found', 404);
        }

        $categories = new Categories();
        $brands = new Brands();

        $products = $this->product->select()->where([
            ['brand_id', '=', $brand->id]
        ])->get();

        return $this->view->render('brand/show', compact('brand', 'products', 'brands', 'categories'));
    }
}