<?php

class File
{

    public static
            function create($location)
    {
        //implicitly creates file
        return fopen($location, 'w') or die('Cannot open file:  ' . $location);
    }

    public static
            function open($location)
    {
        //open file for writing ('w','r','a')...
        return fopen($location, 'w') or die('Cannot open file:  ' . $location);
    }

    public static
            function read($location)
    {
        $handle = fopen($location, 'r');
        return fread($handle, filesize($location));
    }

    public static
            function write($location, $data)
    {
        $handle = fopen($location, 'w') or die('Cannot open file:  ' . $location);
        return fwrite($handle, $data);
    }

    public static
            function add($location, $data, $newData)
    {
        $handle = fopen($location, 'a') or die('Cannot open file:  ' . $location);
        fwrite($handle, $data);
        return fwrite($handle, $newData);
    }

    public static
            function close($location)
    {
        $handle = fopen($location, 'w') or die('Cannot open file:  ' . $location);
        //write some data before using this function
        return fclose($handle);
    }

    public static
            function delete($location)
    {
        unlink($location);
    }

}
