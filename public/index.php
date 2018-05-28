<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . "/../bootstrap/app.php";

use App\Core\{Request, Router};


$router = new Router;

require __DIR__.'/../routes.php';

$dispatcher = fastRoute\simpleDispatcher(function (fastRoute\RouteCollector $r){
    global $router;
    foreach ($router->fetchRoutes() as $route){
        $r->addRoute($route[0], $route[1], $route[2]);
        // die(var_dump($route[1]));
    }
});


$routeinfo = $dispatcher->dispatch(Request::method(), Request::uri());
switch ($routeinfo[0]){
    case FastRoute\Dispatcher::NOT_FOUND:
        die(var_dump("404 error for ".Request::uri()));
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        die(var_dump("asshole not allowed"));
        break;
    case FastRoute\Dispatcher::FOUND:
        try
        {
            if (is_array($routeinfo[1])){
                $controller = new $routeinfo[1][0];
                $function = $routeinfo[1][1];
                $params = $routeinfo[2];
    
                $controller->$function($params);
            }else{
                $routeinfo[1]($routeinfo[2]["filename"]);
            }
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
}
