<?php

return [
    "database" => [
        "name" => 'mytodo',
        "user" => 'root',
        "password" => '',
        'connection' => "mysql:host=127.0.0.1",
        "options"=> [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // remove this line before deployment.
        ]
    ]
];

