<?php

namespace App\Core;
use Exception;

class Request
{
    
    public static function uri()
    {
        /**
         * @return string $uri
         */
        return parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );
    }

    public static function method()
    {
        /**
         * @return string $method
         */
        return $_SERVER['REQUEST_METHOD'];
    }
}


