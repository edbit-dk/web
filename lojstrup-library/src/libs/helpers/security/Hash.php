<?php

class Hash
{

    public static
            function create($string, $salt = '')
    {
        return hash('sha256', $string . $salt);
    }

    public static
            function unique()
    {
        return self::create(uniqid());
    }

    public static
            function encrypt($input, $cryptKey)
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $input, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    }

    public static
            function decrypt($input, $cryptKey)
    {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    }

}
