<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));




function twig()
{
    $loader = new Twig_Loader_Filesystem('app/views');
    $twig = new Twig_Environment($loader);

    $bcfilter = new Twig_SimpleFilter("bc", function($string){
        return password_hash($string, PASSWORD_DEFAULT);
    });

    $lenfilter = new Twig_SimpleFilter('len', function($string){
        return strlen($string);
    });

    $twig->addFilter($bcfilter);
    $twig->addFilter($lenfilter);

    return $twig;
}





