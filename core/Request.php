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

    public static function serve_static($filename)
    {
        if(file_exists($filename)){
            $handler = fopen($filename, "r");
            $content = fread($handler, filesize($filename));
            $content_type = explode(".", $filename)[1];
            if(array_key_exists($content_type, self::$content)){
                header("Content-Type: " . self::$content[$content_type]);
            }
            // header("Remote-Address: 127001:8888");
            return $content;
        }
    }
}


