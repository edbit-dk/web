<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//The first example below will 
//load a file named picture.jpg resize it 
//to 250 pixels wide and 400 pixels high and resave it as picture2.jpg
$image = new ImageModel();
$image->load('picture.jpg');
$image->resize(250, 400);
$image->save('picture2.jpg');


//If you want to resize to a specifed width but keep the 
//dimensions ratio the same then the script can 
//work out the required height for you, just use 
//the resizeToWidth function.
$image = new ImageModel();
$image->load('picture.jpg');
$image->resizeToWidth(250);
$image->save('picture2.jpg');



//You may wish to scale an image 
//to a specified percentage like 
//the following which will resize
//the image to 50% of its original width and height
$image = new ImageModel();
$image->load('picture.jpg');
$image->scale(50);
$image->save('picture2.jpg');


//You can of course do 
//more than one thing at once. 
//following example will create two 
//new images with heights of 200 pixels and 500 pixels

$image = new ImageModel();
$image->load('picture.jpg');
$image->resizeToHeight(500);
$image->save('picture2.jpg');
$image->resizeToHeight(200);
$image->save('picture3.jpg');

//The output function lets you output the 
//image straight to the browser without having 
//to save the file. Its useful for on the fly thumbnail generation
header('Content-Type: image/jpeg');
$image = new ImageModel();
$image->load('picture.jpg');
$image->resizeToWidth(150);
$image->output();


//The following example will resize and save an 
//image which has been uploaded via a form
if (isset($_POST['submit']))
    {
    $image = new ImageModel();
    $image->load($_FILES['uploaded_image']['tmp_name']);
    $image->resizeToWidth(150);
    $image->output();
    }
else
    {
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_image" />

        <input type="submit" name="submit" value="Upload" />

    </form>

    <?php
    }