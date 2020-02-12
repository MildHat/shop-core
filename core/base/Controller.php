<?php


namespace core\base;


use core\base\View\ViewFactory;
use core\Request;
use core\Response;

abstract class Controller
{

    public array $route;
    public string $controller;
    public string $model;
    public string $prefix;

    /** @var ViewFactory */
    public ViewFactory $view;

    /** @var Request */
    public Request $request;

    /** @var Response */
    public Response $response;

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->view = new ViewFactory();
        $this->response = new Response();
        $this->request = new Request();
    }

}