<?php


namespace app\controllers;


use app\models\Brand;

class PagesController extends AppController
{

    public $brand;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->brand = new Brand();
    }

    public function indexAction()
    {

        $brands = $this->brand->find();
        $this->setMeta('Home page');
        $this->view = 'main';
        $this->set(compact('brands'));
    }

    public function aboutAction()
    {
        $this->setMeta('About page');
    }

    public function contactAction()
    {
        $this->setMeta('Contact page');
    }
    
}