<?php


namespace app\models;


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

}