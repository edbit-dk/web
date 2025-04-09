<?php

class Input
{

    public static
            function escape($string)
    {
        return trim(htmlentities($string, ENT_QUOTES, 'UTF-8'));
    }

    // This function expects the input to be UTF-8 encoded.
    public static
            function toSlug($text)
    {
        // Swap out Non "Letters" with a -
        $text = preg_replace('/[^\\pL\d]+/u', '-', $text);

        // Trim out extra -'s
        $text = trim($text, '-');

        // Convert letters that we have left to the closest ASCII representation
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Make text lowercase
        $text = strtolower($text);

        // Strip out anything we haven't been able to convert
        $text = preg_replace('/[^-\w]+/', '', $text);

        return $text;
    }

    public static
            function exists($type = 'post')
    {
        switch ($type)
        {
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

    public static
            function get($item, $info = null)
    {
        if (isset($_POST[$item]))
        {
            return trim(filter_var($_POST[$item], FILTER_SANITIZE_STRING));
        }
        elseif (isset($_GET[$item]))
        {
            return trim(filter_var($_GET[$item],FILTER_SANITIZE_STRING));
        }
        elseif (isset($_FILES[$item][$info]))
        {
            return $_FILES[$item][$info];
        }
        return null;
    }

}
