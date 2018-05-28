<?php

namespace App\Controllers;
use App\Models\User;
use App\Core\Form;
use App\Core\Request;

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

    public function add()
    {
        echo app()->render("add");
    }

    public function create()
    {
        // fix CSRF later.
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = User::create([
            "name" => $name,
            "email" => $email
        ]);
        $user->save();
        header('location: /');
    }
}

