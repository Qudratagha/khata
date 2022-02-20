

<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:login.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit'])) 
{
$sql=mysqli_query($con,"select password FROM  admin where password='".md5($_POST['password'])."' && email='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where email='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
}
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>KataSYSTEM | Change Password Page</title>
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

    <!-- 

      <script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

     -->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Kata</b>SYSTEM</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Change Password</p>




        
        <form  method="post">
         <!--  <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div> -->
          <div class="form-group has-feedback">
            <label class="control-label" for="basicinput">Current Password</label>
            <input type="text" class="form-control" placeholder="Current Password"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label" for="basicinput">New Password</label>
            <input type="password" class="form-control" placeholder="New Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label" for="basicinput">Retype New Password</label>
            <input type="password" class="form-control" placeholder="Retype New Password"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
           <!--  <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>                        
            </div> --><!-- /.col -->
            <div class="col-xs-4">
             <center> <button type="submit"  name="submit" class="btn btn-primary btn-block btn-flat">Change Password</button></center>
            </div><!-- /.col -->
          </div>
        </form>        
<!-- 
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>
 -->
        <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

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