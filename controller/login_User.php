<?php
include "../inc/env.php";
session_start();
$name=$_REQUEST['name'];
$password=$_REQUEST['password'];
$errors=[];

$query = "SELECT * FROM users WHERE email ='$name'";
$response = mysqli_query($conn,$query);
$user = mysqli_fetch_assoc($response);
$encPass = $user['password'];



if (empty($name)) {
    $errors['name_error']="Please Enter Your Name";
}
if (empty($password)) {
    $errors['password_error']='Please Enter Your Password';
}
// if($encPass!=$password){
//     $errors['password_error']="Please Enter a Correct Password";
// }
if ($response -> num_rows > 0) {
    
    $passwordMatch = password_verify($password,$encPass);
    
    if($passwordMatch){
        $_SESSION['auth']=$user;
    header("Location:../backend/index.php");
    }else{
        header("Location:../login.php");
        $errors['password_error']="Please Enter a Correct 
        Password";
    }
} else {
    $errors['name_error']="Please Enter a Valid Email Address";
}
if(count($errors)>0){
    //*REDIRECT BACK
    $_SESSION['errors']=$errors;
    header("Location:../login.php");
}



?>