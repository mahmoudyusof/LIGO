<?php


$router->get("/", "WelcomeController@index");
$router->get("/greet/{name}", "WelcomeController@greet");




