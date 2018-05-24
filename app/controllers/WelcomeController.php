<?php

namespace App\Controllers;
use App\Models\User;

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
    public function show()
    {
        $users = User::where("id", "<", "3")->get();
        echo app()->render("show", compact("users"));
    }
}

