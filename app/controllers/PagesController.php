<?php

namespace App\Controllers;

use App\Core\{App, Form};

class PagesController
{
    public function index()
    {
        $tasks = app()->get('database')->selectAll('todos');

        $users = app()->get('database')->selectAll('users', 'User');
        echo app()->render('index', compact('tasks', 'users'));
    }

    public function about()
    {
        echo app()->render('about');
    }

    public function contact()
    {
        echo app()->render('contact');
    }

    public function add_name()
    {
        if(isset($_POST['token'], $_POST['name'], $_POST['email'])){
            Form::csrf_check($_POST['token']);

            app()->get('database')->insert("users", [
                "name" => $_POST['name'],
                "email" => $_POST['email']
            ]);
            
            header('location: /');
        }else{
            header('location: /contact');
        }
    }
}

