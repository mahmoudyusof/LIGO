<?php

namespace App\Controllers;

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

