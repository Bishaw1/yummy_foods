<?php
include "../inc/env.php";
session_start();
$name=$_REQUEST['name'];
$password=$_REQUEST['password'];
$errors=[];

$query = "SELECT * FROM users WHERE email ='$name'";
$response = mysqli_query($conn,$query);
print_r($response);


// if (empty($name)) {
//     $errors['name_error']="Please Enter Your Name";
// }
// if (empty($password)) {
//     $errors['password_error']='Please Enter Your Password';
// }
// if(count($errors)>0){
//     //*REDIRECT BACK
//     $_SESSION['errors']=$errors;
//     header("Location:../login.php");
// }

?>