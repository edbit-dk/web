<?php

class Token{
    public static function generate() {
        return Session::put((TOKEN_NAME), base64_encode(openssl_random_pseudo_bytes(32)));
    }

    public static function check($token){
        $tokenName = TOKEN_NAME;

        if (Session::exists($tokenName) && $token === Session::get($tokenName))  {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
