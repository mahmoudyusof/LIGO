<?php

namespace App\Core;

class Router
{
    protected $routes = [];


    public function get($uri, $ctrl_str)
    {
        $ctrl_arr = explode("@", $ctrl_str);
        array_push($this->routes, [
            "GET",
            $uri,
            [
                "App\\Controllers\\".$ctrl_arr[0],
                $ctrl_arr[1]
            ]
        ]);
    }

    public function post($uri, $ctrl_str)
    {
        $ctrl_arr = explode("@", $ctrl_str);
        array_push($this->routes, [
            "POST",
            $uri,
            [
                "App\\Controllers\\".$ctrl_arr[0],
                $ctrl_arr[1]
            ]
        ]);
    }


    public function fetchRoutes()
    {
        return $this->routes;
    }

    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])){
            return $this->call_action(...explode('@', $this->routes[$method][$uri]));
        }
        throw new \Exception('404 error, man.');
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


