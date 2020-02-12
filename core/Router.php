<?php


namespace core;


class Router
{
    private static $routes = [];
    private static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function dispatch($uri)
    {
        $uri = \rtrim(self::removeQueryString($uri), '/');

        if (self::matchRoute($uri)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

            if (\class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($controllerObject, $action)) {
                    $output = $controllerObject->$action();
                    $controllerObject->response->content($output);
                    $controllerObject->response->send();
                } else {
                    throw new \Exception("Method {$controller}::{$action} not found", 404);
                }
            } else {
                throw new \Exception("Controller {$controller} not found", 404);
            }
        } else {
            throw new \Exception('Route not found', 404);
        }
    }

    public static function matchRoute($uri)
    {
        foreach (self::$routes as $pattern => $route) {
            if (\preg_match("#{$pattern}#", $uri, $matches)) {
                foreach ($matches as $key => $value) {
                    if (\is_string($key)) {
                        $route[$key] = $value;
                    }
                }

                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // CamelCase
    protected static function upperCamelCase($name)
    {
        $name = \str_replace('-', ' ', $name);
        $name = \ucwords($name);
        $name = \str_replace(' ', '', $name);
        return $name;
    }

    // camelCase
    protected static function lowerCamelCase($name)
    {
        return \lcfirst(self::upperCamelCase($name));
    }

    public static function removeQueryString($uri)
    {
        return \str_replace('?' . $_SERVER['QUERY_STRING'], '', $uri);
    }
}