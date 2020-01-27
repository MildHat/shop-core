<?php


namespace app\controllers;


use core\App;
use core\Request;

class OrderController extends AppController
{
    public function indexAction()
    {
        if (App::$session->contains('cartData')) {

            $productsInCart = App::$session->get('cartData');

            return $this->view->render('order/checkout', compact('productsInCart'));
        }

        $this->response->redirect();
    }

    public function saveAction(Request $request)
    {
        $data = [];
        $data['firstName'] = $request->post('f_name');
        $data['secondName'] = $request->post('s_name');
        $data['companyName'] = $request->post('company_name');
        $data['country'] = $request->post('country');
        $data['address'] = $request->post('address');
        $data['city'] = $request->post('city');
        $data['state'] = $request->post('state');
        $data['postalCode'] = $request->post('postal_code');
        $data['phoneNumber'] = $request->post('phone_number');
        $data['email'] = $request->post('email');
        $data['additional'] = $request->post('additional');

        $address = $data['country'] . ', ' . $data['state'] . ', ' . $data['city'] . ', ' . $data['address'] . ', ' . $data['postalCode'];
        return var_dump($address);

    }
}