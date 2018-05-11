<?php


$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->post('name', 'PagesController@add_name');




