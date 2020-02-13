<?php


namespace app\controllers;


use app\components\UserValidation;
use app\models\User;
use core\App;

class AuthController extends AppController
{

    /** @var User */
    public User $user;

    /** @var UserValidation */
    public UserValidation $userValidation;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->user = new User();
        $this->userValidation = new UserValidation($this->request);
    }

    public function registerAction()
    {
        if ($this->userValidation->validateUserRegistration()) {
            if ($this->user->createUser($this->request)) {
                App::$session->set('username', $this->request->post('username'));
                return 'success';
            }
        }

        $this->response->redirect();
    }

    public function loginAction()
    {
        if ($this->userValidation->validateUserLogin()) {
            $email = $this->request->post('email', 'string');
            $password = $this->request->post('password', 'string');

            $user = $this->user->select()->where([['email' , '=', $email]])->getOne();

            if ($user && password_verify($password, $user->password)) {
                App::$session->set('username', ucfirst($user->username));
                return 'success';
            }
        }

        $this->response->redirect();

    }

}