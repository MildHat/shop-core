<?php


namespace core\base;


use core\Db;

abstract class Model
{
    public $atributes = [];
    public $errors = [];
    public $rules = [];
    public $db;

    public function __construct()
    {
        $db = Db::instance();
        $this->db = $db->connection;
    }
}