<?php

class Hash {
    public static function make($string) {
        return crypt($string . '$2y$10$');
    }

    public static function salt($length) {
        return strtr(substr(base64_encode(openssl_random_pseudo_bytes($length)),0,22), '+', '.');
    }

    public static function makeCookieHash($string) {
        return hash('sha256', $string);
    }

    public static function unique() {
        return self::makeCookieHash(uniqid());
    }

}