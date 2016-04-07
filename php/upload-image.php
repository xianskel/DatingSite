<?php

session_start();

if(isset($_SESSION["username"]) && $_FILES["image"]["name"]){

$username = $_SESSION["username"];

$folder = "../user-photos/";
$extension = pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);
$image = $folder .$username.".".$extension;
$thumbnail = $folder.$username."-thumb.".$extension;


if(isset($_POST["submit"])) {
    $test = getimagesize($_FILES["image"]["tmp_name"]);
    if($test == false) {
        echo "File is not an image.";
        exit();
    }

   if($extension != "jpg" && $extension != "jpeg") {
       echo "Only JPG, JPEG files are allowed.";
       exit();
   }

   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
        
       list($width, $height) = getimagesize($image);

       $largewidth = 600;
       $largeheight = 400;
       $thumbwidth = 300;
       $thumbheight = 200;

       $large = imagecreatetruecolor( $largewidth, $largeheight );
       $thumb = imagecreatetruecolor( $thumbwidth, $thumbheight );

       $source = imagecreatefromjpeg( $image );

       imagecopyresized($large, $source, 0, 0, 0, 0, $largewidth, $largeheight, $width, $height);
       imagejpeg( $large, $image, 80); 

       imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height);
       imagejpeg( $thumb, $thumbnail, 80); 
        
       header("Location: ../edit-profile.php");
   }
    
    else{
         echo "Sorry, there was an error uploading your file.";
    }
}

}

?>