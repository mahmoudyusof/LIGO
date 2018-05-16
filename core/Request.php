<?php

namespace App\Core;
use Exception;

class Request
{
    public static $content = [
        "css" => "text/css",
        "js" => "application/javascript",
        "jpg" => "image/jpg",
        "jpeg" => "image/jpg",
        "png" => "image/png",
        "gif" => "image/gif",
        "mp4" => "video/webm",
        "mp3" => "audio/webm"
    ];
    public static function uri()
    {
        return parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}


