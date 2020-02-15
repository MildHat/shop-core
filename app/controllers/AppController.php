<?php


namespace app\controllers;


use core\App;
use core\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->setLanguage();
    }

    protected function setLanguage()
    {
        if (!App::$session->contains('USER_LANGUAGE')) {
            App::$session->set('USER_LANGUAGE', 'en');
        }

        $languages = require ROOT . '/config/languages.php';

        if (!in_array(App::$session->get('USER_LANGUAGE'), $languages))
            App::$session->set('USER_LANGUAGE', 'en');

        require ROOT . '/config/resources/languages/' . App::$session->get('USER_LANGUAGE') . '.php';
    }
}