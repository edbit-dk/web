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

}
