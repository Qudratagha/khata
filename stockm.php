

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
  $pname=$_POST['pname'];
  $pquantity=$_POST['pquantity'];
  $pprice=$_POST['pprice'];
  $aquantity=$_POST['pquantity'];
  $ksl=$_POST['ksl'];
  $godam=$_POST['godam'];

$sql=mysqli_query($con,"insert into stockm(pname,pquantity,aquantity,pprice,ksl,godam) 
  values('$pname','$pquantity','$aquantity','$pprice','$ksl','$godam')");
$_SESSION['msg']="Category Created !!";

}

if(isset($_POST['newquantity']) && isset($_POST["newprice"]))
{
  $newquantity=$_POST['newquantity'];
  $newprice=$_POST['newprice'];
  $newid = $_POST["id"];
mysqli_query($con, "Update stockm SET aquantity = aquantity + '".$newquantity."', pquantity = pquantity + '".$newquantity."', pprice = pprice + '".$newprice."' where id = '".$newid."'");
}


?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Stock Maintenance</title>
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
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div align="center">
        <section class="content-header">
           <h1>
           <b>STOCK MAINTENENCE</b> </h1>
        </section>
      </div>



 <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row table-responsive" id="printP">
            <table  cellpadding="2" cellspacing="2"   class="datatable-1 table table-bordered  table-striped  display" width="100%">
              <thead>
                    <tr>
                      <th width="5%">Id</th>
                      <th width="10%">PRODUCT NAME</th>
                      <th width="20%">SELLER</th>
                      <th width="10%">GODAM</th>
                      <th width="7%">REMAINING QUANTITY</th> 
                      <th width="7%">ACTUAL QUANTITY</th> 
                    </tr>
                 <tbody>
<?php 
    $query=mysqli_query($con,"select * from stockm");

while($row=mysqli_fetch_array($query))
{ 
?>                    
  <tr>
    <td><b><?php echo htmlentities($row['id']); ?></b></td>
    <td><b><?php echo htmlentities($row['pname']); ?></b></td>
    <td><b><?php echo htmlentities($row['ksl']);?></b></td>
    <td><b><?php echo htmlentities($row['godam']);?></b></td>
    <td><b><?php echo htmlentities($row['pquantity']);?> </b></td>
    <td><b><?php echo htmlentities($row['aquantity']);?> </b></td>
 
  </tr>
<?php } ?>

                  </tbody>
                </thead>
              </table>
            </div>
          </section>

      <form method="post">
    <!-- Trigger the modal with a button -->
<div align="center">
  <button   type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" > ADD PRODUCT</button>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" ><b>ADD PRODUCT</b>    
        </h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="form-horizontal" method="post" >
            <div class="form-group">
              <label class="control-label col-sm-2" for="pname">PRODUCT NAME</label>
              <div class="col-sm-10"> 
                <input type="text" class="form-control" placeholder="PRODUCT NAME" name="pname" >
              </div>
            </div>
            <br>
             <div class="form-group">
              <label class="control-label col-sm-2" for="pquantity">ACTUAL QUANTITY</label>
              <div class="col-sm-10">          
                <input type="number" class="form-control" placeholder="ACTUAL QUANTITY" name="pquantity">
              </div>
            </div>
              <br>
             <div class="form-group">
              <label class="control-label col-sm-2" for="pprice">ACTUAL PRICE</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="ACTUAL PRICE" name="pprice">
              </div>
              <br>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" for="ksl">SELLER</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="SELLER NAME" name="ksl">
              </div>
              <br>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" for="godam">GODAM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="GODAM NAME" name="godam">
              </div>
              <br>
            </div> 
          </form>
        </div>
      </div>
      <div class="modal-footer" align="center">
          <!-- <button type="submit" class="btn" name="submit" >Submit</button> -->
            <button type="submit" name="submit" class="btn btn-default">SUBMIT</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCLE</button>
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
</html>

