<?php

namespace app\controllers;


use core\Db;

class MainController extends AppController
{

    public function actionIndex()
    {
        Db::instance();
    }

}