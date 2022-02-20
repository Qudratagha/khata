
<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && email='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);

if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."' where email='".$_SESSION['alogin']."'");

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
<html lang="en">
<head>
   <meta charset="UTF-8">
    <title>Change Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
   


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
</head>

 <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="index.php"><b>Kata</b>SYSTEM</a>
      </div>
      <div class="register-box-body">
        <p class="login-box-msg"><center><h3>Change Your Password Here...</h3></center></p>
  <div class="wrapper">
    <div class="container">
      <div class="row">
      <div class="span9">
          <div class="content">
            <div class="module">
              <div class="module-body">
                  <?php if(isset($_POST['submit']))
{?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                  </div>
<?php } ?>
                  <br />

          <form class="register-form outer-top-xs" name="chngpwd" method="post" onSubmit="return valid();">           
              <div class="control-group">
                <label class="control-label" for="basicinput">Enter Your Current Password</label>
                  <div class="controls-group">
                    <input type="password" class="form-control unicase-form-control text-input"  name="password" class="span8 tip" required>
                  </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="basicinput">Enter Your New Password</label>
                  <div class="controls">
                    <input type="password" class="form-control unicase-form-control text-input"  name="newpassword" class="span8 tip" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="basicinput">Your New Password Again</label>
                      <div class="controls">
                      <input type="password" class="form-control unicase-form-control text-input"   name="confirmpassword" class="span8 tip" required>
                      </div>
                      </div>
                      <br />
                    <div class="control-group">
                      <div class="controls">
                        <button type="submit" name="submit" class="btn">Submit</button>
                      </div>
                    </div>
                  </form><br />
        <a href="index.php"><button class="btn">Cancle</button> </a>
              </div>
            </div>            
          </div><!--/.content-->
        </div><!--/.span9-->
      </div>
    </div><!--/.container-->
  </div><!--/.wrapper-->


  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>