<?php 

class Password { 

    public static function hash($input) { 
        return md5($input); 
    } 

    public static function verify($input, $data) { 
        return md5($input) === $data; 
    } 

    public static function check($input, $data) { 
        return md5($input) === $data;
    } 

} 