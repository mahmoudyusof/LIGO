<?php

namespace App\Core;

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        /**
         * Injects a dependency to the App instance
         * @param string $key
         * @param mixed $value
         */
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        /**
         * fetches a dependency from the DI
         * @param string $key
         */
        if (! array_key_exists($key, static::$registry)){
            throw new Exception("no {$key} in registry");
        }
        return static::$registry[$key];
    }

    public function render($template, $args=[])
    {
        /**
         * renders the template then shows it
         * @param string $template
         * @param array $args
         */
        echo static::get('twig')->render("{$template}.html", $args);
    }

}

