<?php


namespace app\models;


use core\Request;

class User extends AppModel
{

    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $role_id;
    public $created_at;
    public $updated_at;

    /**
     * Create User
     *
     * @param Request $request
     * @return bool
     */
    public function createUser(Request $request) : bool
    {
        $email = $request->post('email', 'string');
        $username = $request->post('username', 'string');
        $password = $request->post('password', 'string');

        $newUser = new self();
        $newUser->email = $email;
        $newUser->username = $username;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->save();

        return true;
    }

}