<?php


namespace core\base;


class View
{

    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta = [])
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false) {
            $this->layout = false;
        } else {
            // Expression expr1 ?: expr3 returns expr1 if expr1 evaluates to TRUE, and expr3 otherwise.
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        $viewFile = dirname(dirname(__DIR__)) . '/app/views/' . str_replace('\\', '/', $this->prefix)
            . lcfirst($this->controller) . '/' . $this->view . '.php';
        if (is_file($viewFile)) {
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception('View ' . $viewFile . ' not found');
        }
        if ($this->layout !== false) {
            $layoutFile = dirname(dirname(__DIR__)) . '/app/views/layouts/' . $this->layout . '.php';
            if (is_file($layoutFile)) {
                require $layoutFile;
            } else {
                throw new \Exception('Layout ' . $layoutFile . ' not found');
            }
        }
    }

    public function getMeta()
    {
        $title = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL . "\t";
        $description = '<meta name="description" content="' . $this->meta['description'] . '"/>' . PHP_EOL . "\t";
        $keywords = '<meta name="keywords" content="' . $this->meta['keywords'] . '"/>' . PHP_EOL;
        $content = $title . $description . $keywords;
        return $content;
    }


}