<?php

class i18n
{

    protected static
            $_instance = null;
    private
            $_language;

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
            {
            self::$_instance = new i18n($params);
            }
        return self::$_instance;
    }

    // singleton DB connection 
    public
            function __construct($language)
    {
        $this->_language = $language;
    }

    public
            function getString($string_ID, $langauge, $show_ID = false)
    {
        $results = $this->_language->getStringById($langauge, $string_ID);

        if ($show_ID == false)
            {
            foreach ($results as $langauge)
                {
                return $langauge->String;
                }
            }
        else
            {
            foreach ($results as $langauge)
                {
                return 'ID: ' . $langauge->String_ID . ', ' . $langauge->String;
                }
            }
    }

    public
            function getError($ID, $langauge, $show_ID = false)
    {
        $results = $this->_language->getErrorById($langauge, $ID);

        if ($show_ID == false)
            {
            foreach ($results as $langauge)
                {
                return $langauge->String;
                }
            }
        else
            {
            foreach ($results as $langauge)
                {
                return 'ID: ' . $langauge->ID . ', ' . $langauge->String;
                }
            }
    }

    public
            function getFeedback($ID, $langauge, $show_ID = false)
    {
        $results = $this->_language->getFeedbackById($langauge, $ID);

        if ($show_ID == false)
            {
            foreach ($results as $langauge)
                {
                return $langauge->String;
                }
            }
        else
            {
            foreach ($results as $langauge)
                {
                return 'ID: ' . $langauge->ID . ', ' . $langauge->String;
                }
            }
    }

}
