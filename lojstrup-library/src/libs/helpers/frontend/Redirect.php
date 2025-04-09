<?php

class Redirect
{

    public static
            function to($location = null)
    {
        if ($location)
        {
            if (is_numeric($location))
            {
                switch ($location)
                {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        exit();
                        break;
                }
            }
            header('Location: ' . $location);
            exit();
        }
    }

    public static
            function back()
    {
        header('Location: javascript://history.go(-1)');
        exit;
    }

}
