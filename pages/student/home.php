<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pamantasan ng lungsod ng Marikina</title>
  <link rel="icon" type="text/css" href="../images/logo.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-yellow.min.css">

</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../images/logo.png" class="img-responsive"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PLMAR</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search Book...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Book Details</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span> Manage Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Details
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Borrow</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Return</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Reserve</a></li>
              </ul>
            </li>

            <li>
              <a href="#"><i class="fa fa-circle-o"></i> History
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Borrow</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Return</a></li>
              </ul>
            </li>

          </ul>
        </li>


        <li class="header" style="color:#fff">LIBRARY HOURS</li>
        <li class="header" style="color:#fff">MONDAY - FRIDAY 8:00 AM - 7:00 PM</li>
        <li class="header" style="color:#fff">SATURDAY 8:00 AM - 5:00 PM</li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-home"></i> Home</h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-4">
        <!-- first -->
        <img src="../images/rules-and-regulation.jpg" style="height:250px;width:100%" class="img-responsive">
        <p class="text-justify">
          <b>1.</b> All students entering the library must observe proper decorum and should wear their ID while inside the library.
        </p>

        <p class="text-justify">
          <b>2.</b> Silence must be observed at all times.
        </p>

        <p class="text-justify">
          <b>3.</b> Sleeping, eating, drinking, smoking and other disruptive behavior are strictly prohibited inside the library and will be subject to disciplinary action.
        </p>

        <p class="text-justify">
          <b>4.</b> Library users should observe courtesy at all times. Any act of discourtesy toward the librarians will be duly noted for appropriate action.
        </p>

        <p class="text-justify">
          <b>5.</b> All materials, resources, facilities and utilities of the library should be used with proper care.
        </p>

        <p class="text-justify">
          <b>6.</b> Mutilating, defacing, tearing, and vandalizing of books or other properties of the library are strictly prohibited and subject to disciplinary action and suspension of library privileges.
        </p>

        <p class="text-justify">
          <b>7.</b> Library users should submit for inspection anything taken out from the reading room.
        </p>
      </div>
      <!-- second -->

      <div class="col-md-4">
        <img src="../images/NewStudents.jpg" style="height:250px;width:100%" class="img-responsive">
        <p class="text-justify">
         Click Create Account in right side of the login form. Enter your valid information to avoid future problem. for validation code please request it from librarian.
        </p>
      </div>

      <div class="col-md-4">
        <img src="../images/our-system.jpg" style="height:250px;width:100%" class="img-responsive">
        <p class="text-justify">
         Only student or member can use this system. on this system members can borrow book throught online system return and reserve book also they can check borrow details transaction and others. if you find bug or error please report it from librarian. 
         Thank you. 
         <br>By: <strong> Librarian</strong>

        </p>
      </div>




      <div class="clearfix"></div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y')?> All rights reserved.
    <div class="pull-right">
      <strong> Library Hours: Monday - Friday: 8:00 AM - 7:00 PM | Saturday : 8:00 AM - 5:00 PM</strong>
    </div>
    <div class="clearfix"></div>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
</body>
</html>
