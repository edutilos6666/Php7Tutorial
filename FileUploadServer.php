<?php
/*
 * Here i had to create uploads dir and chmod 777 uploads
 * in /opt/lampp/htdocs dir -> where my deployed php files are located.
 */
define ("NL", "br/>");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $uploadOk = 1 ;
    $tmp_file = $_FILES["fileToUpload"]["tmp_name"];
    $src_file = $_FILES["fileToUpload"]["name"];
    $size = $_FILES["fileToUpload"]["size"];

    $targetFile = "uploads/". pathinfo($src_file, PATHINFO_BASENAME);

    $fileExtension = pathinfo($src_file , PATHINFO_EXTENSION);


    $check = getimagesize($tmp_file);

    if($check !== false) {
        $uploadOk = 1 ;
        echo "Mime = " . $check["mime"] . NL ;
    } else {
        $uploadOk = 0 ;
        echo "Fake Imae File". NL ;
    }


    if(file_exists($targetFile)) {
       echo basename($targetFile). " exists already." . NL ;
       $uploadOk = 0 ;
    }

    if($size > 500000) {
        echo "Filesize is too large." . NL ;
        $uploadOk = 0 ;
    }


    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    if(!in_array($fileExtension, $allowed_extensions)) {
        echo "Only " . join(", ", $allowed_extensions) . " are supported.". NL ;
        $uploadOk = 0 ;
    }


    if($uploadOk == 1) {
        if(move_uploaded_file($tmp_file, $targetFile)) {
            echo basename($tmp_file). " was uploaded successfully.". NL ;
        } else {
            echo basename($tmp_file) . " could not be uploaded.". NL ;
        }
    }


} else {
    echo "no isset <br/>";
}