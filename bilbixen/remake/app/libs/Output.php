<?php

class Output {

    public static function escape($string) {
        return trim(htmlentities($string, ENT_QUOTES, 'UTF-8'));
    }

     public static function html($string) {
        return html_entity_decode($string);
    }
}
