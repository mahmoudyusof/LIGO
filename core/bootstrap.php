<?php

use App\Core\{App, Form, Router};


session_start();

$app = new App();

$app->bind('config', require __DIR__ . '/../config.php');

// uncomment this if you want a database connection

// $app->bind('database', new QueryBuilder(
//     Connection::make($app->get('config')['database'])
// ));

$twig = new Twig_Environment(
    new Twig_Loader_Filesystem(__DIR__ . '/../app/views')
);

$csrf_field = new Twig_Function("csrf_field", function(){
    $token = Form::csrf_generate();
    return "<input type='hidden' name='token' value='{$token}'>";
});

$static = new Twig_Function("static", function($filename){
    return "/assets/{$filename}";
});

$twig->addFunction($csrf_field);
$twig->addFunction($static);

// add features to the twig instance here.

$app->bind('twig', $twig);

function app()
{
    global $app;
    // die(var_dump(base64_encode(openssl_random_pseudo_bytes(32))));
    return $app;
}

