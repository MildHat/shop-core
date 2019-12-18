<?php


namespace app\controllers;


class PageController extends AppController
{
    public function actionIndex()
    {
        $this->set(['test' => 'test']);
    }

    public function actionShow()
    {
        var_dump($this->route);
        echo __METHOD__;
    }

}