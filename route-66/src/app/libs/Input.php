<?php

class Input {

    public static function encode($string) {
        return trim(htmlentities($string, ENT_QUOTES, 'UTF-8'));
    }

    public static function decode($string) {
        return html_entity_decode($string);
    }

    public static function exists($type = 'post') {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            case 'files':
                return (!empty($_FILES)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item, $info = null) {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } elseif (isset($_GET[$item])) {
            return $_GET[$item];
        } elseif (isset($_FILES[$item][$info])) {
            return $_FILES[$item][$info];
        }
        return null;
    }

    public static function truncate($input, $maxWords, $maxChars) {
        $words = preg_split('/\s+/', $input);
        $words = array_slice($words, 0, $maxWords);
        $words = array_reverse($words);

        $chars = 0;
        $truncated = array();

        while (count($words) > 0) {
            $fragment = trim(array_pop($words));
            $chars += strlen($fragment);

            if ($chars > $maxChars)
                break;

            $truncated[] = $fragment;
        }

        $result = implode($truncated, ' ');

        return $result . ($input == $result ? '' : '');
    }

}
