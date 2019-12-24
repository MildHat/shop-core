<?php


namespace app\models;


class User extends AppModel
{

    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

}