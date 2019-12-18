<?php


namespace core;


class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once dirname(__DIR__) . '/config/config_db.php';
        $dbh = new \PDO($db['dsn'], $db['username'], $db['password']);
    }
}