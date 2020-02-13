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
        $this->setResponses();
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

    /**
     * Sets the response templates
     */
    private function setResponses()
    {
        $files = scandir(ROOT . '/config/responses');
        $files = array_splice($files, 2);

        $filesWithPath = [];
        $titles = [];

        foreach ($files as $file) {
            $titles[] = str_replace('.json', '', $file);
            $filesWithPath[] = ROOT . '/config/responses/' . $file;
        }

        $responses = [];

        foreach ($filesWithPath as $file) {
            foreach ($titles as $title) {
                $responses[$title] = file_get_contents($file);
            }
        }

        self::$app->setProperty('responses', $responses);
    }
}
