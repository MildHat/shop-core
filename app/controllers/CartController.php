<?php


namespace app\controllers;


use core\App;

class CartController extends AppController
{
    public function addAction()
    {
        if ($this->request->post('data', 'boolean')) {

            App::$session->set(
                'cartData',
                json_decode($this->request->post('data'), true)
            );

            return 'ok';
        }

        $this->response->redirect();
    }
}