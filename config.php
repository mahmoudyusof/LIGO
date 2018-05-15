<?php

return [
    "database" => [
        "name" => 'database name',
        "user" => 'username',
        "password" => 'password',
        'connection' => "mysql:host=put host here",
        "options"=> [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // remove this line before deployment.
        ]
    ]
];

