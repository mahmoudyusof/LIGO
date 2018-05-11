<?php

namespace App\Models;

class User
{
    public $pk;
    public $name;
    public $email;

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}