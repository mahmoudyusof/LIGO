<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function index()
    {
        $tasks = App::get('database')->selectAll('todos');

        $users = App::get('database')->selectAll('users');

        echo twig()->render('index.html', compact('tasks', 'users'));
    }

    public function about()
    {
        echo twig()->render('about.html');
    }

    public function contact()
    {
        echo twig()->render('contact.html');
    }

    public function add_name()
    {
        App::get('database')->insert("users", [
            "name" => $_POST['name'],
            "email" => $_POST['email']
        ]);
        
        header('location: /');
    }
}

