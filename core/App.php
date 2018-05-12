<?php

namespace App\Core;

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (! array_key_exists($key, static::$registry)){
            throw new Exception("no {$key} in registry");
        }
        return static::$registry[$key];
    }

    public function render($template, $args=[])
    {
        echo static::get('twig')->render("{$template}.html", $args);
    }

}

