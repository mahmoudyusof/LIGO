<?php

namespace App\Controllers;
use App\Core\Form;

class WelcomeController
{
    public function index()
    {
        echo app()->render("index");
    }

    public function greet($name)
    {
        echo app()->render("greet", $name=$name);
    }
}

