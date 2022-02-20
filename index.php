
<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
    header('location:login.php');
  }




date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y');


if(isset($_GET['del'])){
  mysqli_query($con,"delete from roznamcha where id = '".$_GET['id']."'");
    mysqli_query($con,"delete from clientkhata where rid = '".$_GET['id']."'");
  $_SESSION['delmsg']="Row deleted !!";
  header('location: index.php');  
  return;
}

if(isset($_POST['submit']))
{

  $id=$_POST['name'];
  
  $query=mysqli_query($con,"select * from clientdetails where id='".$id."'");
  $row=mysqli_fetch_row($query);
  $name = $row["1"];

  $pid=$_POST['pname'];
  $pquery=mysqli_query($con,"select * from stockm where id='".$pid."'");
  $prow=mysqli_fetch_row($pquery);
  $pname = $prow["1"];
  $stock_id = $prow["0"]; 
  $rquantity = $prow["2"];

  $pquantity=$_POST['pquantity'];
  if ($pquantity > $rquantity) {
    $_SESSION["increase"] = '<span style="color:#FF0000; align:center;" > Quantity is less than your wish Please try again.';
    header('location: index.php');
    return;
  }
  if ($name === 'Mall Khata'){
    $updateQuery = mysqli_query($con, "Update stockm SET pquantity = pquantity - '".$pquantity."' where id = '".$stock_id."'");
  }

  $tafseel=$_POST['tafseel'];
  $totalAmount = $_POST["totalAmount"];
  $jamaOrBanam = $_POST['amount'];
  $jama = 0;
  $banam = 0;
  $jamaYnBanam = "Nil";
  if ($jamaOrBanam === 'jama') {
    $jama= $totalAmount;
  }
  else {
      $banam = $totalAmount;
  }
  $q=mysqli_query($con,"select count(baqaya) as number from roznamcha");
  $r=mysqli_fetch_row($q);
  $numberOfrows = $r["0"];
  
  if($numberOfrows > 0) {
                $query2=mysqli_query($con,"select id, baqaya from roznamcha ORDER BY id DESC limit 1");
                $row2=mysqli_fetch_row($query2);
                $baqaya = $row2["1"];
                    if($baqaya < 0) {
                            if ($jamaOrBanam === 'banam') {
                                  $baqaya = ($baqaya) - $totalAmount;   
                            }
                            else{
                              $baqaya = -(abs($baqaya) - $totalAmount);
                            }
                      }
                    elseif ($baqaya > 0) {
                            if ($jamaOrBanam === 'banam') {
                              $baqaya = $baqaya - $totalAmount;
                            }
                            else{
                              $baqaya = $baqaya + $totalAmount;
                            }
                    }
                    else
                    {
                        if ($jamaOrBanam === 'banam') {
                          $baqaya = $baqaya - $totalAmount;
                        }
                        else{
                            $baqaya = $baqaya + $totalAmount;
                          }
                    }
                  
                
                if ($baqaya > 0) {
                  $jamaYnBanam = "jama";
                }
                elseif ($baqaya < 0) {
                  $jamaYnBanam = "banam";
                }
                else
                {
                  $jamaYnBanam = "Nil";
                }
              } 
              else 
                {
                  $baqaya = $jama - $banam;
                    if ($baqaya > 0) 
                    {
                      $jamaYnBanam = "jama";
                    }
                    elseif ($baqaya < 0) 
                    {
                      $jamaYnBanam = "banam";
                    }
                    else
                    {
                      $jamaYnBanam = "Nil";
                    }
                }




//ye hisab logkhata wala ha...
              
      $qq=mysqli_query($con,"select Lid from clientkhata where cid='".$id."'");
      $rids = [];
      while($r=mysqli_fetch_array($qq)){ 
      $rids[] = $r["Lid"];
      }
        $totalAmnt = $_POST["totalAmount"];
        $jamaOBanam = $_POST['amount'];
        $jamaa = 0;
        $banaam = 0;
        $jamaYBanam = "Nil";

        if ($jamaOBanam === 'jama') {
          $jamaa= $totalAmnt;
        }
        else {
            $banaam = $totalAmnt;
        }
        if(count($rids) > 0) {

                
              foreach ($rids as $key => $value) 
              {
                $qqq=mysqli_query($con,"select baqaya from logkhata where id='".$value."'");
                $rr = mysqli_fetch_assoc($qqq);
                $baqayaa = $rr['baqaya'];
                  $qbaq=mysqli_query($con,"select count(baqaya) as number from logkhata");
                  $rbaq=mysqli_fetch_row($qbaq);
                  $numbOfrows = $rbaq["0"];
                  
                  if($numbOfrows > 0) {
            
                                    if($baqayaa < 0) {
                                            if ($jamaOBanam === 'banam') {
                                                  $baqayaa = ($baqayaa) - $totalAmnt;   
                                            }
                                            else{
                                              $baqayaa = -(abs($baqayaa) - $totalAmnt);
                                            }
                                      }
                                    elseif ($baqayaa > 0) {
                                            if ($jamaOBanam === 'banam') {
                                              $baqayaa = $baqayaa - $totalAmnt;
                                            }
                                            else{
                                              $baqayaa = $baqayaa + $totalAmnt;
                                            }
                                    }
                                    else
                                    {
                                        if ($jamaOBanam === 'banam') {
                                          $baqayaa = $baqayaa - $totalAmnt;
                                        }
                                        else{
                                            $baqayaa = $baqayaa + $totalAmnt;
                                          }
                                    }
                                if ($baqayaa > 0) {
                                  $jamaYBanam = "jama";
                                }
                                elseif ($baqayaa < 0) {
                                  $jamaYBanam = "banam";
                                }
                                else
                                {
                                  $jamaYBanam = "Nil";
                                }
                              } 
                              else 
                                {
                                  $baqayaa = $jama - $banam;
                                    if ($baqayaa > 0) 
                                    {
                                      $jamaYBanam = "jama";
                                    }
                                    elseif ($baqayaa < 0) 
                                    {
                                      $jamaYBanam = "banam";
                                    }
                                    else
                                    {
                                      $jamaYBanam = "Nil";
                                    }
                                }
               }
              } else {
                $baqayaa = $jama - $banam;
                if ($baqayaa > 0) 
                {
                  $jamaYBanam = "jama";
                }
                elseif ($baqayaa < 0) 
                {
                  $jamaYBanam = "banam";
                }
                else
                {
                  $jamaYBanam = "Nil";
                }
              }        

$sql=mysqli_query($con,"insert into roznamcha(name,pname,pquantity,tafseel,jama,banam, jamaOrBanam, baqaya) 
  values('$name','$pname','$pquantity','$tafseel','$jama','$banam', '$jamaYnBanam', '$baqaya')");
$rid = $con->insert_id;

$sql2=mysqli_query($con,"insert into clientkhata(rid, cid) values('$rid','$id')");
$clientkhataid = $con->insert_id;


$sql3=mysqli_query($con,"insert into logkhata(name,pname,pquantity,tafseel,jama,banam, jamaNbanam, baqaya) 
  values('$name','$pname','$pquantity','$tafseel','$jamaa','$banaam', '$jamaYBanam', '$baqayaa')");
$Lid = $con->insert_id;
$sql4=mysqli_query($con,"update clientkhata set Lid = '$Lid' where id='".$clientkhataid."'");
$_SESSION["success"] = '<span style="color:#228B22; align:center;" >    Data Added Successfully';
header('location: index.php');
return;
}


if(isset($_POST['update']))
{
  $id=$_POST['name'];
  $query=mysqli_query($con,"select * from clientdetails where id='".$id."'");
  $row=mysqli_fetch_row($query);
  $name = $row["1"];
  $tafseel=$_POST['tafseel'];
  $totalAmount = $_POST["totalAmount"];
  $jamaOrBanam = $_POST['amount'];
  $jama = 0;
  $banam = 0;
  $jamaYnBanam = "Nil";
  if ($jamaOrBanam === 'jama') {
    $jama= $totalAmount;
  }
  else {
      $banam = $totalAmount;
  }
  $q=mysqli_query($con,"select count(baqaya) as number from roznamcha");
  $r=mysqli_fetch_row($q);
  $numberOfrows = $r["0"];
 if($numberOfrows > 0) {
              $query2=mysqli_query($con,"select id, baqaya from roznamcha ORDER BY id DESC limit 1");
              $row2=mysqli_fetch_row($query2);
              $baqaya = $row2["1"];
                  if($baqaya < 0) {
                          if ($jamaOrBanam === 'banam') {
                                $baqaya = ($baqaya) - $totalAmount;   
                          }
                          else{
                            $baqaya = -(abs($baqaya) - $totalAmount);
                          }
                    }
                  elseif ($baqaya > 0) {
                          if ($jamaOrBanam === 'banam') {
                            $baqaya = $baqaya - $totalAmount;
                          }
                          else{
                            $baqaya = $baqaya + $totalAmount;
                          }
                  }
                  else
                  {
                      if ($jamaOrBanam === 'banam') {
                        $baqaya = $baqaya - $totalAmount;
                      }
                      else{
                          $baqaya = $baqaya + $totalAmount;
                        }
                  }
                
              
              if ($baqaya > 0) {
                $jamaYnBanam = "jama";
              }
              elseif ($baqaya < 0) {
                $jamaYnBanam = "banam";
              }
              else
              {
                $jamaYnBanam = "Nil";
              }
            } 
            else 
              {
                $baqaya = $jama - $banam;
                  if ($baqaya > 0) 
                  {
                    $jamaYnBanam = "jama";
                  }
                  elseif ($baqaya < 0) 
                  {
                    $jamaYnBanam = "banam";
                  }
                  else
                  {
                    $jamaYnBanam = "Nil";
                  }
              }
   
  $postId = $_POST['id'];
  $newquery2=mysqli_query($con,"select id from clientkhata where rid = '".$postId."'");
  $newrow2=mysqli_fetch_row($newquery2);
  $client_id = $newrow2[0];
$sql=mysqli_query($con,"update roznamcha SET name = '$name', tafseel = '$tafseel',jama = '$jama',banam='$banam', jamaOrBanam='$jamaYnBanam', baqaya='$baqaya' where id='".$postId."'");


$sql2=mysqli_query($con,"update clientkhata set rid = '$postId', cid = '$id' where id='".$client_id."'");


}



?>



<!DOCTYPE html>
<html>
  <head>

  <meta charset="UTF-8">
    <title>Roznamcha</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- print -->
  <script type="text/javascript">
    function printPage(printP) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById('printP').innerHTML;
    document.body.innerHTML= printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
   </script>



    <style type="text/css">
      .pl-0 {
        padding-left: 0;
        margin-top: 0.5em;
      }

      @media print{
            #print {display: none;}

          }


      .mt {
        margin-top: 0.5em;
      }
      .d-flex {
        display: flex;
      }
    </style>
    <style type="text/css">
      .display-flex {
        /*margin-top: 1em;*/
        display: flex;
      }
      .mt-2 {
        margin-top: 0.5em;
      }
    </style>
   
  </head>
  <body class="skin-blue">
    <div class="wrapper">      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Asfand</b>Traders</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Notifications: style can be found in dropdown.less -->
             
                           <!-- Tasks: style can be found in dropdown.less -->
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpeg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Asfand Afridi</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpeg" class="img-circle" alt="User Image" />
                    <p>
                      Tayyab Paracha - Company Owner 
                      
                    </p>
                  </li>
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="register.php" class="btn btn-default btn-flat">Change-Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpeg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Tayyab Paracha</p>

              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              
              <a href="index.php">
                <i class="fa fa-book"></i> <span>Roznamcha</span> 
              </a>

              <a href="logkhata.php">
                <i class="fa fa-dashboard"></i> <span>Accounts</span> 
              </a>
             
              <a href="stockm.php">
                <i class="fa fa-clock-o"></i> <span>Stock Maintenance</span> 
              </a> 
               <a href="search.php">
                <i class="fa fa-circle"></i> <span>Search</span> 
              </a>
               <!-- <a href="searchitem.php">
                <i class="fa fa-angle-left"></i> <span>SearchItem</span> 
              </a> -->

      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <div align="center">
        <section class="content-header">
           <h1>
           <b>Roznamcha</b> </h1>
          
      <!-- <div  class="col-xs-12 col-sm-12 col-md-6 top-search-holder pl-0">
        <div class="search-area">
            <form name="search" method="post" action="search-result.php" class="form-inline">
                <div class="control-group">
                  <input class="search-field form-control" placeholder="Search by serial number" name="product" required="required" />
                  <button class="search-button btn btn-primary" type="submit" name="search">search</button>
                </div>
            </form>
        </div>        
        </div>
        <div align="pull-left">
  <button align="center" type="button" class="btn btn-primary mt" data-toggle="modal" data-target="#myModal">New Entry </button>
</div> -->

        </section>
      </div>
        <div class="row">
          <div class="col-md-4 display-flex mt-2">
            <form method="POST" action="index.php">
              <input type="hidden" value="0" name="mode">
              <button class="btn btn-primary" align="center" type="submit"  name="Today">Today</button>
            </form>
            <form  method="POST" action="index.php">
              <input type="hidden" value="1" name="mode">
              <button  class="btn btn-primary" align="center" type="submit"  name="yesterday">Previous Data </button>
            </form>
            <div id="error">
              <?php if(isset($_SESSION["increase"])) {
                echo $_SESSION["increase"];
                unset($_SESSION["increase"]);} ?>
            </div>
            <div id="success">
              <?php if(isset($_SESSION["success"])) {
                echo $_SESSION["success"];
                unset($_SESSION["success"]);} ?>
            </div>
          </div>
          <div  class="col-md-4 top-search-holder pl-0">
   
        </div>
          <div class="col-md-2 mt-2">
            <button  align="left" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >New Entry </button>
          </div>
          <div class="col-md-2 mt-2">
            <button class="btn btn-success btn-lg" onclick="printPage('printP')">Print</button>
          </div>
        </div>




          <?php if(isset($_POST['del']))
{?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                </div>
<?php } ?>
        <!-- Content Header (Page header) -->
        
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row table-responsive" id="printP">
            <table  cellpadding="2" cellspacing="2"   class="datatable-1 table table-bordered  table-striped  display" width="100%">
              <thead>
                    <tr>
                      <th>S.#</th>
                      <th>DATE</th>
                      <th>NAME</th> 
                      <th>PRODUCT NAME</th>
                      <th>PRODUCT QUANTITY</th>
                      <th>DETAILS</th>
                      <th>CREDIT</th>
                      <th>DEBIT</th>
                      <th>CREDIT/DEBIT</th>
                      <th>REMAINING</th>
                      <th>UPDATE/DEL</th>
                    </tr>
                 <tbody>
<?php 

$condition=""; 
$mode=0; 
if(isset($_POST["mode"])){
$mode=$_POST["mode"]; }

switch($mode){
case 0:   $condition="WHERE date(date)= DATE(NOW()) ORDER BY date DESC"; echo "TODAY"; break; 
case 1:   $condition="WHERE date(date) != DATE(NOW()) ORDER BY date DESC"; echo "LAST ENTERED DATA";  break; 

}
$updateDate = date("d/m/Y");



$query=mysqli_query($con,"select id,date,name,pname,pquantity,tafseel,jama,banam, jamaOrBanam, baqaya from roznamcha ".$condition."");
$rowcount=mysqli_num_rows($query);
$count = 0;
while($row=mysqli_fetch_array($query)){ $count++;
?>                    
  <tr>
    <td><b><?php echo htmlentities($row['id']); ?></b></td>
    <td><b><?php echo htmlentities(date('d/m/Y', strtotime($row['date']))); ?></b></td>
    <td><b><?php echo htmlentities($row['name']);?> </b></td>
    <td><b><?php echo htmlentities($row['pname']);?> </b></td>
    <td><b><?php echo htmlentities($row['pquantity']);?> </b></td>
    <td><b><?php echo htmlentities($row['tafseel']);?></b></td>
    <td><b><?php echo htmlentities($row['jama']);?></b></td>
    <td><b><?php echo htmlentities($row['banam']);?></b></td>
    <td><b><?php echo htmlentities($row['jamaOrBanam']);?></b></td>
    <td><b><?php echo htmlentities($row['baqaya']);?></b></td>
    <td>
      <?php
     $dateDB = (date('d/m/Y', strtotime($row['date'])));
     if(($count === $rowcount) && ($dateDB === $updateDate))
       { ?>
     <div class="d-flex">
     <button type="button" class="btn" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">
       <i class="icon-edit">Update</i>
     </button>
     <a class="btn" href="roznamcha.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
       <i class="icon-remove-sign">Del</i>
     </a>
     </div>
      <!-- Modal Code -->
      <form method="post" name="myForm" action="#">
          <!-- Trigger the modal with a button -->
      <div id="message<?php echo $row['id'];?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" align="Left" ><b>Roznamcha</b>    
              </h4>
            </div>
            <?php
              $newid = $row['id'];
              $newQuery=mysqli_query($con,"select tafseel, jama, banam from roznamcha where id='".$row['id']."'");
              $newRow = mysqli_fetch_array($newQuery);
              $newtafseel = $newRow[0];
              $newjama = $newRow[1];
              $newbanam = $newRow[2];
              if($newjama === 0) {
                $newtotalAmount = $newbanam;
              }else {
                $newtotalAmount = $newjama;
              }
              
            ?>
            <div class="modal-body">
        <div class="container">
  <form class="form-horizontal" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name Khata</label>
      <div class="col-sm-10"> 
<select  name="name" class="form-control">
<?php
$sql = mysqli_query($con, "select id,cname from clientdetails ");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql))
{
echo "<option value='". $row['id'] ."'>" .$row['cname'] ."</option>" ;
}
?>
</select>
   <!--<input type="text" class="form-control" placeholder="Enter Khata" name="name" required>-->   
 </div>
    </div>
    <br>

     <div class="form-group">
      <label class="control-label col-sm-2" for="pname" required>Product Name</label>
      <div class="col-sm-10">          
        <select  name="pname" class="form-control">
          <option value=""></option>
<?php
$psql = mysqli_query($con, "select id,pname from stockm ");
$prow = mysqli_num_rows($psql);
while ($prow = mysqli_fetch_array($psql))
{
echo "<option value='". $prow['id'] ."'>" .$prow['pname'] ."</option>" ;
}
?>
</select>
       <!--  <input type="text" class="form-control" placeholder="Maal Tafseel" name="tafseel"> -->
      </div>
    </div>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pquantity">Quantity</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Quantity" name="pquantity" required>
      </div>
    </div>
    <br>


     <div class="form-group">
      <label class="control-label col-sm-2" for="tafseel">DETAIL</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="PRODUCT DETAIL" name="tafseel" required>
      </div>
    </div>
    <br>
<!--      <div class="form-group">
      <label class="control-label col-sm-2" for="jama">Jama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="jama Amount" name="jama">
      </div>
      <br>
    </div> -->
    
    <!--  <div class="form-group">
      <label class="control-label col-sm-2" for="banam">Banam</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="banam Amount" name="banam">
      </div>
    </div> -->
     <div class="form-group">
      <label class="control-label col-sm-2" for="totalAmount">Amount</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="ENTER AMOUNT" name="totalAmount" required>
      </div>
      <div class="col-sm-5" align="center">        
        <input type="radio" name="amount" value="jama"><b> CREDIT</b><br>
        <input type="radio" name="amount" value="banam"><b>DEBIT</b><br>
      </div>
     </div> 
  </form>
</div>
      </div>
            <div class="modal-footer" align="center">
              <input type="hidden" name="id" value="<?php echo $newid; ?>">
              <button type="submit" name="update" class="btn btn-default">Update</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </form>
      <!-- end of modal -->
    </td>
    <?php } ?>
 </tr>
                    <?php  } ?>
                    </tbody> 
                  </thead>
              </table>
<form method="post" name="myForm" action="#">
    <!-- Trigger the modal with a button -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="Left" ><b>Roznamcha</b>    
        </h4>
      </div>
      <div class="modal-body">
        <div class="container">
  <form class="form-horizontal" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name Khata</label>
      <div class="col-sm-10"> 
<select  name="name" class="form-control">
<?php
$sql = mysqli_query($con, "select id,cname from clientdetails ");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql))
{
echo "<option value='". $row['id'] ."'>" .$row['cname'] ."</option>" ;
}
?>
</select>
   <!--<input type="text" class="form-control" placeholder="Enter Khata" name="name" required>-->   
 </div>
    </div>
    <br>

     <div class="form-group">
      <label class="control-label col-sm-2" for="pname">Product Name</label>
      <div class="col-sm-10">          
        <select  name="pname" class="form-control">
          <option value=""></option>
<?php
$psql = mysqli_query($con, "select id,pname from stockm ");
$prow = mysqli_num_rows($psql);
while ($prow = mysqli_fetch_array($psql))
{
echo "<option value='". $prow['id'] ."'>" .$prow['pname'] ."</option>" ;
}
?>
</select>
       <!--  <input type="text" class="form-control" placeholder="Maal Tafseel" name="tafseel"> -->
      </div>
    </div>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pquantity">Quantity</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" placeholder="Enter Quantity" name="pquantity" required>
      </div>
    </div>
    <br>


     <div class="form-group">
      <label class="control-label col-sm-2" for="tafseel">DETAIL</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="PRODUCT DETAILS" name="tafseel" required>
      </div>
    </div>
    <br>
<!--      <div class="form-group">
      <label class="control-label col-sm-2" for="jama">Jama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="jama Amount" name="jama">
      </div>
      <br>
    </div> -->
    
    <!--  <div class="form-group">
      <label class="control-label col-sm-2" for="banam">Banam</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="banam Amount" name="banam">
      </div>
    </div> -->
     <div class="form-group">
      <label class="control-label col-sm-2" for="totalAmount">AMOUNT</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" placeholder="AMOUNT" name="totalAmount" required>
      </div>
      <div class="col-sm-5" align="center">        
        <input type="radio" name="amount" value="jama"><b> CREDIT</b><br>
        <input type="radio" name="amount" value="banam"><b>DEBIT</b><br>
      </div>
     </div> 
  </form>
</div>
      </div>
      <div class="modal-footer" align="center">
          <!-- <button type="submit" class="btn" name="submit" >Submit</button> -->
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>
  </div>
</form>
            </div>

            <!-- line jo footer ko seprate kr raha hain...... -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
              </div><!-- ./col -->
            
            </div><!-- /.row -->
                </div>
                  </div>
                  <div class="box-body">
                  </div>
                </div>
              </section><!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">          
                  </div> <!-- /.box-footer -->
                </div><!-- /.box -->
              </section><!-- right col -->
            </div><!-- /.row (main row) -->
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="#">Asfand Agha</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
  <script>
  function required()
{
var empt = document.forms["myform"]["pquantity"].value;
if (empt == "")
{
alert("Please input a Value");
return false;
}
else 
{
alert('Code has accepted : you can try another');
return true; 
}
}
</script>
</html>
