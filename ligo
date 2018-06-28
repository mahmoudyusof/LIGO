#!/usr/bin/env php

<?php

require 'bootstrap/app.php';

use App\Migrations\CreateUsersMigration;

$migrants = [
    new CreateUsersMigration,
];

$commands = [
    "migrate" => "migrates the tables to the database\n",
    "migrate:refresh" => "refreshes migrations to the database\n",
    "migrate:back" => "Rolls back all the tables\n",
    "make:controller" => "Creates a new controller"
];

switch ($argv[1]){
    case "migrate":
        foreach($migrants as $migrant){
            $migrant->up();
            echo get_class($migrant) . " Migrated successfuly\n";
        }
        break;
    case "migrate:refresh":
        foreach($migrants as $migrant){
            $migrant->down();
            $migrant->up();
            echo get_class($migrant) . " Re-Migrated successfuly\n";
        }
        break;
    case "migrate:back":
        foreach($migrants as $migrant){
            $migrant->down();
            echo get_class($migrant) . " Rolled back successfuly\n";
        }
        break;
    case "make:controller":
        $fpoint = fopen(__DIR__ . "\\app\\controllers\\".ucfirst($argv[2])."Controller.php", "x");
        echo "Making the {$argv[2]} controller\n";
        
        fwrite($fpoint,
"<?php

namespace App\\Controllers;

class {$argv[2]}Controller 
{
    public function index()
    {

    }
}
"
        );
        
        fclose($fpoint);
        echo "Controller {$argv[2]} made successfuly\n";
        break;
    default:
        echo "this is to help you\n\n\n";
        foreach(array_keys($commands) as $command){
            echo $command . " : " . $commands[$command] . "\n";
        }
        
}


