<?php


namespace app\controllers;


use app\models\Brand;
use app\models\Collection;

class PagesController extends AppController
{

    public $brand;
    public $collection;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->brand = new Brand();
        $this->collection = new Collection();
    }

    public function indexAction()
    {
        $brands = $this->brand->find();
        $latestCollection = $this->collection->getLatestCollection();
        $latestCollections = $this->collection->getLatestCollections();
        $this->setMeta('Home page');
        $this->view = 'main';
        $this->set(compact('brands', 'latestCollection', 'latestCollections'));
    }

    public function aboutAction()
    {
        $brands = $this->brand->find();
        $this->set(compact('brands'));
        $this->setMeta('About page');
    }

    public function contactAction()
    {
        $this->setMeta('Contact page');
    }

}