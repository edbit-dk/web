<?php 

class Hash { 

    public static function makeCookieHash($string, $salt = '') { 
        return hash('sha256', $string . $salt); 
    } 

    public static function unique() { 
        return self::makeCookieHash(uniqid()); 
    } 

} 