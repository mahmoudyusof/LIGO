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
}


