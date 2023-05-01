<?php
require "../inc/env.php" ;
$id = $_REQUEST['id'];
// $query = "SELECT * from banners WHERE id = '$id'";
$query ="UPDATE banners set status = 0";   //*NEW 
$response = mysqli_query($conn, $query);


// $query= "UPDATE banners set status = 1 WHERE id='$id'";

if($banner['status']  == 1){
    $query = "UPDATE banners SET status=0 WHERE id = '$id'";
} else{
    $query = "UPDATE banners SET status=1 WHERE id = '$id'";
}

$response = mysqli_query($conn, $query);
if($response){
    header("location: ../backend/allBanner.php");
}