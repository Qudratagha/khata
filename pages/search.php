
<?php
session_start();
include('includes/config.php');
/*if(strlen($_SESSION['alogin'])==0)
  { 
    header('location:index.php');
  }

*/


date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y');




?>



<!DOCTYPE html>
<html>
  <head>
     <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <meta charset="UTF-8">
    <title>Khata System</title>
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
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    function validateForm() {
  var x = document.forms["myForm"]["name"].value;
  if (x == "" || x == null) {
    alert("First Create New Khata then you can Make new Entry in Roznamcha...");
    return false;
  }</script>
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
        <a href="index.html" class="logo"><b>Kata</b>System</a>
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
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Tayyab Paracha</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Asfand Agha - Web Developer
                      <small>Member since Jan. 2020</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Tayyab Paracha</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              
              <a href="roznamcha.php">
                <i class="fa fa-book"></i> <span>Roznamcha</span> 
              </a>

              <a href="logkhata.php">
                <i class="fa fa-dashboard"></i> <span>Khata</span> 
              </a>
             
          <!--     <a href="mkkd.html">
                <i class="fa fa-clock-o"></i> <span>Khata Jat</span> 
              </a> -->

             <!--   <a href="emptypage.php">
                <i class="fa fa-circle"></i> <span></span> 
              </a> -->

            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li> -->
                <li><a href="index.php"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="register.php"><i class="fa fa-circle-o"></i> Change-Password</a></li>
               </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <div align="center">
        <section class="content-header">
           <h1>
           <b>search result</b> </h1>
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
          <div class="col-md-2 mt-2">
            <button class="btn btn-success btn-lg" onclick="printPage('printP')">Print</button>
          </div>
        </div>




         <div class="container" style="width:900px;">  
                <h2 align="center">Ajax PHP MySQL Date Range Search using jQuery DatePicker</h2>  
                <h3 align="center">Order Data</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
               

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
</html>

