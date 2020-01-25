<?php


namespace app\controllers;


use app\models\User;
use core\App;
use core\Request;

class AuthController extends AppController
{

    public $user;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->user = new User();
    }


    public function registerAction(Request $request)
    {
        if ($request->post('email', 'boolean') && $request->post('username', 'boolean') && $request->post('password', 'boolean')) {
            $email = $request->post('email', 'string');
            $username = $request->post('username', 'string');
            $password = $request->post('password', 'string');

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $newUser = new User();
                $newUser->email = $email;
                $newUser->username = $username;
                $newUser->password = password_hash($password, PASSWORD_DEFAULT);
                $newUser->save();

                App::$session->set('username', ucfirst($username));

                return 'success';
            } else {
                throw new \Exception('error in email', 422);
            }
        } else {
            throw new \Exception('error in fields', 422);
        }

    }

    public function loginAction(Request $request)
    {
        if ($request->post('email', 'boolean') && $request->post('password', 'boolean')) {
            $email = $request->post('email', 'string');
            $password = $request->post('password', 'string');

            $user = $this->user->select()->where([['email' , '=', $email]])->getOne();

            if ($user) {
                if (password_verify($password, $user->password)) {

                    App::$session->set('username', ucfirst($user->username));

                    return 'success';

                } else {
                    throw new \Exception('error', 422);
                }

            } else {
                throw new \Exception('error', 422);
            }

        } else {
            throw new \Exception('error', 422);
        }

    }

}