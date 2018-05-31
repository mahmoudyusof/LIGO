<?php

namespace App\Core;

class Form
{
    public static function csrf_generate()
    {
        /**
         * Generate a token for the csrf field
         * 
         * @return string $token
         */
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        $_SESSION['token'] = $token;
        return $token;
    }

    public static function csrf_check($token)
    {
        /**
         * Compares the token given to the one on the session
         * @param string $token
         */
        if(isset($_SESSION['token']) && $token === $_SESSION['token']){
            unset($_SESSION['token']);
            return true;
        }
        throw new \Exception("CSRF Error");
    }
}
