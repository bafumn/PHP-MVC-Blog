<?php

namespace App\Core;

class Router
{
    private $routes = array();
    private $route = array();

    public function __construct()
    {
        $routesConfig = require ROOT . '/app/config/routes.php';
        foreach ($routesConfig as $route => $params) {
            $this->routes[$route] = $params;
        }
    }

    private function matchRoute($url)
    {
        foreach($this->routes as $pattern => $route) {
            if (preg_match("#^$pattern$#", $url, $matches)) {
                foreach($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($key)) {
                            $match = (int) $match;
                        }
                        $route[$key] = $match;
                    }
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $this->route = $route;
                return true;
            }
        }
        return false;
    }

    public function dispatch()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($this->matchRoute($url)) {
            $controllerPath = 'app\controllers\\' . $this->route['prefix'] . $this->route['controller'] . 'Controller';
            if (class_exists($controllerPath)) {
                $action = $this->route['action'] . 'Action';
                if (method_exists($controllerPath, $action)) {
                    $controller = new $controllerPath($this->route);
                    $controller->$action();
                } else {
                    View::errorPage(404);
                }
            } else {
                View::errorPage(404);
            }
        } else {
            View::errorPage(404);
        }
    }
}
