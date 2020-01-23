<?php


namespace core;


class App
{
    /** @var Logger */
    public static $logger;

    /** @var Registry */
    public static $app;

    /** @var Session */
    public static $session;

    public function __construct()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        self::$logger = new Logger();
        new ErrorHandler();
        self::$app = Registry::instance();
        $this->setParams();
        self::$session = Session::instance();
        App::$session->start();
        Router::dispatch($uri);
    }

    private function setParams()
    {
        if (file_exists(dirname(__DIR__) . '/config/params.php')) {
            $params = require dirname(__DIR__) . '/config/params.php';
            foreach ($params as $key => $value)
                self::$app->setProperty($key, $value);
        }
    }
}
