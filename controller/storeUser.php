<?php
session_start();
include '../inc/env.php';
$name=($_REQUEST['name']);
$email=($_REQUEST['email']);
$number=($_REQUEST['number']);
$password=($_REQUEST['password']);
$confirm_password=($_REQUEST['confirm_password']);
$enc_password= password_hash($password,PASSWORD_BCRYPT);

$errors=[];


if (empty($name)) {
    $errors['name_error']="Please Enter Your Name";
}

if (empty($email)) {
    $errors['email_error']="Please Enter Your Email Address";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email_error']="Please Enter Your Email Address";
}



if (empty($number)) {
    $errors['number_error']="Please Enter a Phone Number";
} 
if(strlen($number)!=11) {
    $errors['number_error']="Please Enter a Valid Number";
}

if (empty($password)) {
    $errors['password_error']='Please Enter Your Password';
}elseif (strlen($password)<8) {
    $errors['password_error']="Please Enter a Strong Password";
}
if (empty($confirm_password)) {
    $errors['con_password_error']="Please Enter Your Confirm Password";
}elseif ($password!==$confirm_password) {
    $errors['con_password_error']="Confirm Password didn't Match ";
}


if(count($errors)>0){
    //*REDIRECT BACK
    $_SESSION['errors']=$errors;
    header("Location:../register.php");
}else {
    $query="INSERT INTO users(name, email, number, password) VALUES ('$name','$email','$number','$enc_password')";
    $response=mysqli_query($conn,$query);

    if ($response) {
        header("Location:../login.php");
    } 
    
}




?>