<?php
require_once './inc/login_header.php';
session_start()
?>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Login</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4">Login Pannel</h3>
</div>
<div class="w-100">
<p class="social-media d-flex justify-content-end">
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
</p>
</div>
</div>
<form action="./controller/login_User.php" method="POST" class="login-form">
<div class="form-group mt-3">
<input name="name" type="text" class="form-control rounded-left" placeholder="Email" >   
<?php
if (isset($_SESSION['errors']['name_error'])) {
    ?>
    <span style=color:red><?=$_SESSION['errors']['name_error']?></span>
    <?php
} 

?>
<!-- <label class="form-control-placeholder" for="username">Username</label> -->
</div>
<div class="form-group mt-3">
<input name="password" id="password-field" type="password" placeholder="Password"  class="form-control rounded-left">
<?php 
    if(isset($_SESSION['errors']['password_error'])){
        ?>
        <span style='color:red'><?=$_SESSION['errors']['password_error']?></span>
        <?php
    }
    ?>
<!-- <label class="form-control-placeholder" for="password">Password</label> -->
<!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50 text-left">
</div>
<div class="w-50 text-md-right">
<a href="./register.php">Register Now ?</a>
</div>
</div>
</form>
<!-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> -->
</div>
</div>
</div>
</div>
</div>
</section>
<?php
require_once './inc/login_footer.php';
session_unset();
?>