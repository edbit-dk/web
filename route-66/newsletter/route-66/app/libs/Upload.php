<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author ThomasElvin
 */
class Upload {

    public static function verify($input) {
        
    }

    public static function file($type, $tmp_name, $name) {
        $ext = str_replace('image/', '.', $type);
        $file = md5($name) . $ext;

        if (file_exists(UPLOADS_FOLDER . $file)) {
            return false;
        } else {
            return copy($tmp_name, UPLOADS_FOLDER . $file);
        }
    }

    public static function compress($source, $destination, $quality = 75) {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    public static function clear() {
        // Settings
        $uploadsdir = UPLOADS_FOLDER; // Directory to cache files in (keep outside web root)

        if ($handle = @opendir($uploadsdir)) {
            while (false !== ($file = @readdir($handle))) {
                if ($file != '.' and $file != '..') {
                    //echo $file . ' deleted.<br>';
                    @unlink($uploadsdir . '/' . $file);
                }
            }
            @closedir($handle);
        }

        //curl http://www.your_domain.com/empty_caching.php >/dev/null 2>&1
    }

}
