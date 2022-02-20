

<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}

date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y');


if(isset($_POST['submit']))
{
  $cname=$_POST['cname'];
  $cphone=$_POST['cphone'];
  $caddress=$_POST['caddress'];

  
$sql=mysqli_query($con,"insert into clientdetails(cname,cphone,caddress) values('$cname','$cphone','$caddress')");
$_SESSION['msg']="Category Created !!";


}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Accounts</title>
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
        margin-top: .5em;
      }
    </style>

  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Tayyab</b>Traders</a>
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
                  <span class="hidden-xs">Tayyab Paracha</span>
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
      <div align="right" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section  class="content-header">
         
          <h1>
          <center> <b>ACCOUNTS</b> </center>
          </h1>

        </section>

        <div class="row">
          

           <div class="col-md-11 mt-2">
            <button class="btn btn-success btn-lg" onclick="printPage('printP')">Print</button>
          </div>
        </div>


        <!-- Main content -->
         <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row table-responsive" id="printP">

                 
            <table  class="table table-hover" cellpadding="2" cellspacing="2"  class="datatable-1 table table-bordered table-striped  display" width="100%">
              <thead>
                    <tr>    
                      <th>ID</th>
                      <th>NAME</th> 
                      <th>CREDITS/DEBITS</th>
                      <th>TOTAL</th>
                      <th>CHECK DETAILS</th>
                    </tr>
                  </thead>
                  <tbody>
                     <!-- modal code -->
                  <?php 
                 
                  $query=mysqli_query($con,"select * from clientdetails"); 
        
                    while($row=mysqli_fetch_array($query)){
                      $in_client_id = $row['id'];
                      $in_qq=mysqli_query($con,"select Lid from clientkhata where cid='".$in_client_id."'");
                      $in_rids = [];
                       while($r=mysqli_fetch_array($in_qq)){ 
                            $in_rids[] = $r["Lid"];
                      }
                      $value = end($in_rids);
                      $in_qqq=mysqli_query($con,"select * from logkhata where id='".$value."'");
                      $in_rr=mysqli_fetch_row($in_qqq);
                        ?>                    
                    <tr>

                    <?php
                          
?>

                      <td><?php echo htmlentities($row['id']);?></td>
                     
                      <td><?php echo htmlentities($row['cname']);?></td>
                      <td><?php
                               if($in_rr !== null) echo $in_rr[8]; ?></td>
                      <td><?php 
                               if($in_rr !== null) echo $in_rr[9]; ?></td>
                      <td><button type="button" class="btn btn-success" id="print" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">Show</button>
                      </td>
                     
                      <td>
                        <div id="message<?php echo $row['id'];?>" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                 <div class="table-responsive">
                               <table  cellpadding="2" cellspacing="2" border="1"  class="datatable-1 table table-bordered table-striped  display" >
                                      <thead>
                                        <tr >
                                          <td colspan="7" align="center"><?php $client_id = $row['id'];?></td>
                                        </tr>
                                            <tr>
                                            <th>S.#</th>
                                            <th>DATE</th>
                                            <th>NAME</th> 
                                            <th>PRODUCT NAME</th>
                                            <th>PRODUCT QUANTITY</th>
                                            <th>DETAIL</th>
                                            <th>CREDIT</th>
                                            <th>DEBIT</th>
                                            <th>CREDIT/DEBIT</th>
                                            <th>REMAINING</th>
                                          </tr>
                                            
                                          <tbody>
                                            <?php
                                                  $qq=mysqli_query($con,"select Lid from clientkhata where cid='".$client_id."'");
                                                  $rids = [];
                                                   while($r=mysqli_fetch_array($qq)){ 
                                                        $rids[] = $r["Lid"];
                                                  }

                                                  foreach ($rids as $key => $value) {
                                                    $qqq=mysqli_query($con,"select * from logkhata where id='".$value."'");
                                                    $rr = mysqli_fetch_assoc($qqq)?>
                                                    <tr>
                                                    <td><b><?php echo htmlentities($rr['id']); ?></b></td>
                                                    <td><b><?php echo htmlentities(date('d/m/Y', strtotime($rr['date']))); ?></b></td>
                                                    <td><b><?php echo htmlentities($rr['name']);?> </b></td>
                                                    <td><b><?php echo htmlentities($rr['pname']);?> </b></td>
                                                    <td><b><?php echo htmlentities($rr['pquantity']);?> </b></td>
                                                    <td><b><?php echo htmlentities($rr['tafseel']);?></b></td>
                                                    <td><b><?php echo htmlentities($rr['jama']);?></b></td>
                                                    <td><b><?php echo htmlentities($rr['banam']);?></b></td>
                                                    <td><b><?php echo htmlentities($rr['jamaNbanam']);?></b></td>
                                                    <td><b><?php echo htmlentities($rr['baqaya']);?></b></td>
                                                    </tr>
                                                 <?php }  
                                                ?>                
                                            </tbody>
                                          </thead>
                                      </table>
                                      </div>
                                       <div class="modal-footer" align="center">
                                  <button type="submit" class="btn btn-default">Print</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                     </tr>                
                    <?php  } ?>
                    </tbody> 
              </table>
</div>




<!-- end modAL -->

<form method="post">
    <!-- Trigger the modal with a button -->
<div align="center">
  <button   type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" > Create New Khata</button>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" ><b>kuch bi bad me</b>    
        </h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="form-horizontal" method="post" >
            <div class="form-group">
              <label class="control-label col-sm-2" for="cname">cname</label>
              <div class="col-sm-2"> 
                <input type="text" class="form-control" placeholder="Enter Khata" name="cname" required>
              </div>
            </div>
            <br>
             <div class="form-group">
              <label class="control-label col-sm-2" for="cphone">cphone</label>
              <div class="col-sm-2">          
                <input type="number" class="form-control" placeholder="Phone number" name="cphone" required>
              </div>
            </div>
              <br>
             <div class="form-group">
              <label class="control-label col-sm-2" for="caddress">caddress</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="jama Amount" name="caddress" required>
              </div>
              <br>
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
        <strong>Copyright &copy; 2019-2020 <a href="#">Asfand Agha</a>.</strong>All rights reserved.
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
</html>