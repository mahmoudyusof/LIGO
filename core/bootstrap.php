<?php

use App\Core\App;
use App\Core\Form;

session_start();

$app = new App();

$app->bind('config', require 'config.php');

$app->bind('database', new QueryBuilder(
    Connection::make($app->get('config')['database'])
));

$twig = new Twig_Environment(
    new Twig_Loader_Filesystem('app/views')
);

$csrf_field = new Twig_Function("csrf_field", function(){
    $token = Form::csrf_generate();
    return "<input type='hidden' name='token' value='{$token}'>";
});

$twig->addFunction($csrf_field);

// add features to the twig instance here.

$app->bind('twig', $twig);

function app()
{
    global $app;
    // die(var_dump(base64_encode(openssl_random_pseudo_bytes(32))));
    return $app;
}

