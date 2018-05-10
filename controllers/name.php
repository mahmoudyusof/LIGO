<?php

$app['database']->insert("users", [
    "name" => $_POST['name'],
    "email" => $_POST['email']
]);

header('location: /');


