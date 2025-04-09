<?php 

class Upload { 

    public static function file($type, $tmp_name, $name) { 
        $ext = str_replace('image/', '.', $type); 
        $file = md5($name) . $ext; 

        if (file_exists(UPLOADS_FOLDER . $file)) { 
            return false; 
        } else { 
            return copy($tmp_name, UPLOADS_FOLDER . $file); 
        } 
    } 

    public static function clear() { 
    
        $uploadsdir = UPLOADS_FOLDER; // Directory to save files in (keep outside web root) 

        if ($handle = opendir($uploadsdir)) { 
            while (false !== ($file = readdir($handle))) { 
                if ($file != '.' and $file != '..') { 
                    unlink($uploadsdir . '/' . $file); 
                } 
            } 
            closedir($handle); 
        } 


    } 

} 