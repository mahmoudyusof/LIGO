<?php

namespace App\Core;

class Form
{
    public static function csrf_generate()
    {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        $_SESSION['token'] = $token;
        return $token;
    }

    public static function csrf_check($token)
    {
        if(isset($_SESSION['token']) && $token === $_SESSION['token']){
            unset($_SESSION['token']);
            return true;
        }
        throw new \Exception("CSRF Error");
    }
}
