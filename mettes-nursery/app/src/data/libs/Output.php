<?php

class Output {

    public static function decode($string) {
        return html_entity_decode($string);
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
