<?php
require_once "../inc/env.php";
$id=$_REQUEST['id'];
$query="SELECT banner_img from banners WHERE id='$id'";
$response=mysqli_query($conn,$query);
$banner =mysqli_fetch_assoc($response);
$path ="../uploads/".$banner['banner_img'];
if (file_exists($path)) {
    unlink($path);
    // if ($response) {
    //     header("Location:../backend/allBanner.php");
    // }
}
$query = "DELETE FROM banners WHERE id='$id'";
$response=mysqli_query($conn,$query);


?>