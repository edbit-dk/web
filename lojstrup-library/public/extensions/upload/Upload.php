<?php

class Upload
{

    // object instance
    private static
            $_instance = null;
    private
            $_storage,
            $_errors          = array(),
            $_renames         = array(),
            $_size            = 1024 * 8000,
            $_formats         = array("jpg", "png", "gif", "zip", "bmp");

    public
            function __construct($storage)
    {
        $this->_storage = $storage;
    }

    public static
            function load($params = null)
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Upload($params);
        }
        return self::$_instance;
    }

    public
            function filename($filename)
    {
        $count = 0;

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Loop $_FILES to exeicute all files
            foreach ($_FILES[$filename]['name'] as $f => $name)
            {
                if ($_FILES[$filename]['error'][$f] == 4)
                {
                    continue; // Skip file if any error found
                }
                if ($_FILES[$filename]['error'][$f] == 0)
                {
                    if ($_FILES[$filename]['size'][$f] > $this->_size)
                    {
                        $this->addError("$name is too large!.");
                        continue; // Skip large files
                    }
                    elseif (!in_array(pathinfo($name, PATHINFO_EXTENSION), $this->_formats))
                    {
                        $this->addError("$name is not a valid format");
                        continue; // Skip invalid file formats
                    }
                    else
                    { // No error found! Move uploaded files 
                        $ext    = str_replace('image/', '.', $_FILES[$filename]["type"][$f]);
                        $rename = md5($name) . $ext;
                        $this->addRename($rename);

                        if (move_uploaded_file($_FILES[$filename]["tmp_name"][$f], $this->_storage . $rename))
                            $count++; // Number of successfully uploaded file
                    }
                }
            }
        }
    }

    public
            function clear()
    {

        $uploadsdir = $this->_storage; // Directory to save files in (keep outside web root)  

        if ($handle = opendir($uploadsdir))
        {
            while (false !== ($file = readdir($handle)))
            {
                if ($file != '.' and $file != '..')
                {
                    unlink($uploadsdir . $file);
                }
            }
            closedir($handle);
        }
    }

    public
            function remove($name)
    {
        unlink($this->_storage .$name);
    }

    private
            function addError($errors)
    {
        $this->_errors[] = $errors;
    }

    private
            function addRename($name)
    {
        $this->_renames[] = $name;
    }

    public
            function renames()
    {
        return $this->_renames;
    }

    public
            function errors()
    {
        return $this->_errors;
    }

}
