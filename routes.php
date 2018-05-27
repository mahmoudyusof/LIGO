<?php


$router->get("/", "WelcomeController@index");
$router->get("/greet/{name}", "WelcomeController@greet");
$router->get("/show", "WelcomeController@show");
$router->get("/add", "WelcomeController@add");
$router->post("/add", "WelcomeController@create");

