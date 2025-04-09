<?php

class Image {

    private $folder;

    public function __construct() {
        $this->folder = $folder;
    }

    public function gallery() {
        $handle = opendir($this->folder);
        while (false !== ($image = readdir($handle))) {
            if ($image != '.' && $image != '..') {
                $gallery[] = $image;
            }
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

    public function resizeJpegImage($img, $w, $h) {
        $thumbnail = imagecreatetruecolor($w, $h);
        $image = imagecreatefromjpeg($img);

        $imageize = getimagesize($img);
        imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $w, $h, $imagesize[0], $imagesize[1]);
        imagejpeg($thumbnail, $img);
    }

    public function resizePngImage($img, $w, $h) {
        $thumbnail = imagecreatetruecolor($w, $h);
        $image = imagecreatefrompng($img);

        $imagesize = getimagesize($img);
        imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $w, $h, $imagesize[0], $imagesize[1]);
        imagepng($thumbnail, $img);
    }

    public function resizeGifImage($img, $w, $h) {
        $thumbnail = imagecreatetruecolor($w, $h);
        $image = imagecreatefromgif($img);

        $imagesize = getimagesize($img);
        imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $w, $h, $imagesize[0], $imagesize[1]);
        imagegif($thumbnail, $img);
    }

    public function resize($width, $height) {
        /* Get original image x y */
        list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
        /* calculate new image size with ratio */
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* new file name */
        $path = 'uploads/' . $width . 'x' . $height . '_' . $_FILES['image']['name'];
        /* read binary data from image file */
        $imgString = file_get_contents($_FILES['image']['tmp_name']);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        /* Save image */
        switch ($_FILES['image']['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $path;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }

}
