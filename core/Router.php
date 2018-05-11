<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])){
            return $this->call_action(...explode('@', $this->routes[$method][$uri]));
        }
        throw new Exception('404 error, man.');
    }

    protected function call_action($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if(! method_exists($controller, $action)){
            throw new Exception("controller {$controller} does not have a {$action} method");
        }
        return (new $controller)->$action();
    }

}


