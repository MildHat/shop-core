<?php


namespace core\base;


use core\Db;

abstract class Model
{
    public $atributes = [];
    public $errors = [];
    public $rules = [];
    public $db;
    public $table = null;

    public function __construct()
    {
        $db = Db::instance();
        $this->db = $db->connection;
    }

    public function getTableName(): string
    {
        if ($this->table !== null && is_string($this->table)) {
            return $this->table;
        } else {
            $className = get_class($this);
            $className = explode('\\', $className);
            $className = $className[array_key_last($className)];
            $tableName = lcfirst($className) . 's';
            return $tableName;
        }
    }
}