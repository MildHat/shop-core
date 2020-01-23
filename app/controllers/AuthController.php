<?php


namespace app\controllers;


use app\models\User;
use core\App;

class AuthController extends AppController
{

    public $user;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->user = new User();
    }


    public function registerAction()
    {
        if (isset($_POST['email'], $_POST['username'], $_POST['password'])) {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $newUser = new User();
                $newUser->email = $email;
                $newUser->username = $username;
                $newUser->password = password_hash($password, PASSWORD_DEFAULT);
                $newUser->save();

                App::$session->set('username', ucfirst($username));

                echo 'success';
            } else {
                throw new \Exception('error', 422);
            }
        } else {
            throw new \Exception('error', 422);
        }

        $this->layout = false;
    }

    public function loginAction()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = (string)$_POST['email'];
            $password = $_POST['password'];

            $user = $this->user->select()->where([
                ['email' , '=', $email]
            ])->getOne();

            if ($user) {
                if (password_verify($password, $user->password)) {

                    App::$session->set('username', ucfirst($user->username));

                    echo 'success';

                } else {
                    throw new \Exception('error', 422);
                }

            } else {
                throw new \Exception('error', 422);
            }

        } else {
            throw new \Exception('error', 422);
        }

        $this->layout = false;
    }

}