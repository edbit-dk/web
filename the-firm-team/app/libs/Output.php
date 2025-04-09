<?php

class Output {

    public static function escape($string) {
        return trim(htmlentities($string, ENT_QUOTES, 'UTF-8'));
    }

}
