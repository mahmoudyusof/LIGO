<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

$twig = new Twig_Environment(
    new Twig_Loader_Filesystem('app/views')
);

// add features to the twig instance here.

App::bind('twig', $twig);


