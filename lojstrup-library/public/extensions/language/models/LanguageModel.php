<?php

class LanguageModel
{

    protected static
            $_instance = null;
    private
            $_storage;

    // singleton DB connection 
    public
            function __construct($connection)
    {
        $this->_storage = $connection;
    }

    public static
            function load($connection)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new LanguageModel($connection);
        }
        return self::$_instance;
    }

    // get translation to string
    public
            function getStringById($langauge, $string_ID)
    {
        $sql = "SELECT 
        Translations.String, 
        Translations.String_ID
        FROM Translations 
        LEFT JOIN Languages 
        ON Languages.ID = Translations.Lang_ID
        WHERE Languages.Name = '$langauge'
        AND Translations.String_ID = '$string_ID'";
        $this->_storage->query($sql);
        return $this->_storage->results();
    }

    // get translation to string
    public
            function getErrorById($langauge, $ID)
    {
        $sql = "SELECT 
        Error_Codes.String_ID,
        Error_Codes.String
        FROM Error_Codes
        LEFT JOIN Languages 
        ON Languages.ID = Error_Codes.Lang_ID
        WHERE Languages.Name = '$langauge'
        AND Error_Codes.String_ID = '$ID'";
        $this->_storage->query($sql);
        return $this->_storage->results();
    }
    
        // get translation to string
    public
            function getFeedbackById($langauge, $ID)
    {
        $sql = "SELECT 
        Feedbacks.ID,
        Feedbacks.String 
        FROM Feedbacks
        LEFT JOIN Languages 
        ON Languages.ID = Feedbacks.Lang_ID
        WHERE Languages.Name = '$langauge'
        AND Feedbacks.ID = '$ID'";
        $this->_storage->query($sql);
        return $this->_storage->results();
    }

}
