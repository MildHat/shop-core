<?php


namespace app\controllers;


use app\models\Brand;
use core\App;

class PagesController extends AppController
{

    /** @var Brand */
    public Brand $brand;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->brand = new Brand();
    }

    public function indexAction()
    {
        $brands = $this->brand->select()->get();

        return $this->view->render('pages/main', compact('brands'));
    }

    public function aboutAction()
    {
        $brands = $this->brand->select()->get();

        return $this->view->render('pages/about', compact('brands'));
    }

    public function contactAction()
    {
        return $this->view->render('pages/contact');
    }

    public function changeLanguageAction()
    {
        App::$session->set('USER_LANGUAGE', $this->request->post('lang'));
        return App::$app->getProperty('responses')['success'];
    }

}