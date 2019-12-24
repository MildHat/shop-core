<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{

    public $user;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->user = new User();
    }

    public function showAction()
    {
        $users = $this->user->find([
            'order' => 'id desc'
        ]);
    }
}