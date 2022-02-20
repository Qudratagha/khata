<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
date_default_timezone_set('Asia/Karachi');
$ldate=date( 'd-m-Y h:i:s A', time () );
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="login.php";
</script>
