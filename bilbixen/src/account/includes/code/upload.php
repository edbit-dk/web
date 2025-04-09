<?php

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if ((($_FILES["file"]["type"] == "image/gif") 
            || ($_FILES["file"]["type"] == "image/jpeg") 
            || ($_FILES["file"]["type"] == "image/jpg") 
            || ($_FILES["file"]["type"] == "image/pjpeg") 
            || ($_FILES["file"]["type"] == "image/x-png") 
            || ($_FILES["file"]["type"] == "image/png")) 
            && ($_FILES["file"]["size"] < 2000000) 
            && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
                           
                $ext = str_replace('image/', '.', $_FILES['file']['type']);
                $filename = str_replace($ext, '', $_FILES['file']['name']);
                $file = md5($filename) . $ext;
                
            if (file_exists($storage . $file)) {
                $uploaderror = $file . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $storage . $file);
            }
        }
    } else {
        echo "Invalid file";
    }
