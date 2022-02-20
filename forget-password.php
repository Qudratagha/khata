
<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
    $confirmpassword=md5($_POST['confirmpassword']);
    
$query=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' and contact='$contact'");
$num=mysqli_fetch_array($query);
if($num>0)
{
  if($password === $confirmpassword){

  
$extra="login.php";
mysqli_query($con,"update admin set password='$password' WHERE email='$email' and contact='$contact' ");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']= 'Password Changed Successful.';
exit();
}
else
{

  $extra="forget-password.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Password and ConfirmPassword are not Same";
exit();

}
}
else
{
$extra="forget-password.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Contact no";
exit();
}
}
?> 
 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tayyab Tradders | forget-password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Tayyab</b>Traders</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Log in to start your session</p>
       <form class="register-form outer-top-xs" name="register" method="post">
  <span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
  </span>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
        <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required >
    </div>
      <div class="form-group">
        <label class="info-title" for="exampleInputPassword1">Contact no <span>*</span></label>
     <input type="text" name="contact" class="form-control unicase-form-control text-input" id="contact" required>
    </div>
<div class="form-group">
        <label class="info-title" for="password">Password. <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
      </div>

<div class="form-group">
        <label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
      </div>    
      <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="change">Change</button>
      <a href="index.php" class="btn-upper btn btn-primary checkout-page-button">Cancle</a>
  </form> 

      <!--   <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> --><!-- /.social-auth-links -->

       
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>