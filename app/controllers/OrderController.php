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

    public function saveAction()
    {
        $data = [];
        $data['firstName'] = $this->request->post('f_name');
        $data['secondName'] = $this->request->post('s_name');
        $data['companyName'] = $this->request->post('company_name');
        $data['country'] = $this->request->post('country');
        $data['address'] = $this->request->post('address');
        $data['city'] = $this->request->post('city');
        $data['state'] = $this->request->post('state');
        $data['postalCode'] = $this->request->post('postal_code');
        $data['phoneNumber'] = $this->request->post('phone_number');
        $data['email'] = $this->request->post('email');
        $data['additional'] = $this->request->post('additional');

        $address = $data['country'] . ', ' . $data['state'] . ', ' . $data['city'] . ', ' . $data['address'] . ', ' . $data['postalCode'];
        return var_dump($address);

    }
}