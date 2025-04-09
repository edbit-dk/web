<?php

class Token
{

    public static
            function generate($key)
    {

        return $_SESSION[$key] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public static
            function show()
    {
        return base64_encode(openssl_random_pseudo_bytes(32));
    }

    public static
            function check($key, $token)
    {

        if (isset($_SESSION[$key]) && $token == $_SESSION[$key])
        {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

}
