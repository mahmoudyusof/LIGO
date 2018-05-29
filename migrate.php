<?php

require 'bootstrap/app.php';

use App\Migrations\CreateUsersMigration;

switch ($argv[1]){
    case "migrate":
        CreateUsersMigration::up();
        echo "database migrated successfuly";
        break;
    case "migrate-refresh":
        CreateUsersMigration::down();
        CreateUsersMigration::up();
        echo 'database migrated successfuly';
        break;
}


