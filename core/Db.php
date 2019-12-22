<?php


namespace core;


class Db
{
    use TSingletone;

    public $connection;

    protected function __construct()
    {
        $config = require dirname(__DIR__) . '/config/config_db.php';

        // mysql:host=localhost;db_name=mildhat_db
        $this->connection = new \PDO("mysql:host={$config['host']};dbname={$config['db_name']}",
            $config['username'], $config['password']);
    }
}
