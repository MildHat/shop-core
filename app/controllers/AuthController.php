<?php


namespace app\controllers;


use app\components\UserValidation;
use app\models\User;
use core\App;
use core\Request;

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
            $email = $this->request->post('email', 'string');
            $username = $this->request->post('username', 'string');
            $password = $this->request->post('password', 'string');

            $newUser = new User();
            $newUser->email = $email;
            $newUser->username = $username;
            $newUser->password = password_hash($password, PASSWORD_DEFAULT);
            $newUser->save();

            App::$session->set('username', ucfirst($username));

            return 'success';
        }

        throw new \Exception('error in fields', 422);
    }

    public function loginAction()
    {
        if ($this->userValidation->validateUserRegistration()) {
            $email = $this->request->post('email', 'string');
            $password = $this->request->post('password', 'string');

            $user = $this->user->select()->where([['email' , '=', $email]])->getOne();

            if ($user && password_verify($password, $user->password)) {
                App::$session->set('username', ucfirst($user->username));
                return 'success';
            }
        }
        throw new \Exception('error', 422);

    }

}