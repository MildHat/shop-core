<?php


namespace app\controllers;


use core\App;
use core\Request;

class CartController extends AppController
{
    public function addAction(Request $request)
    {
        if ($request->post('data', 'boolean')) {

            $cartItems = json_decode($request->post('data'), true);

            App::$session->set('cartData', $cartItems);

            return 'ok';
        }

        $this->response->redirect();
    }
}