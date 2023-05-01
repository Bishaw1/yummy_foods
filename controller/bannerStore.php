<?php
session_start();
require "../inc/env.php";


$title = $_REQUEST['title'];
$description = $_REQUEST['description'];
$cta = $_REQUEST['cta'];
$cta_url = $_REQUEST['cta_url'];
$video_url = $_REQUEST['video_url'];
$banner_img = $_FILES['banner_img'];

$errors = [];
$extension = pathinfo($banner_img['name'], PATHINFO_EXTENSION);

$acceptedType = ['jpg', 'png', 'webp'];





if ($banner_img['size'] == 0) {
    $errors['banner_img_error'] = "Please enter a Image";
} else if ($banner_img['size']>5000000){
    $errors['banner_img_error'] = "Please enter a Image below 5mb";  
}
else if (!in_array($extension, $acceptedType)) {
    $errors['banner_img_error'] = "Please enter an image that has a extension of jpg ,png, or webp.";
}


if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header("Location: ../backend/banner.php");
} else {

    //*unique_Name
    $newName = "banner" . '-' . uniqid() . '.' .  $extension; //*New 
    $path = "../uploads";
    if (!file_exists($path)) {   
        mkdir($path);//*New
    }
    //*upload_Img
    $uploadedFile = move_uploaded_file($banner_img['tmp_name'], "../uploads/$newName"); //*NEW



    if ($uploadedFile) {



        $query = "INSERT INTO banners(title, detail, cta, cta_url, video_url, banner_img) VALUES ('$title', '$description', '$cta', '$cta_url', '$video_url', '$newName')";

        $response = mysqli_query($conn, $query);

        header("location: ../backend/allBanner.php");
    }
}