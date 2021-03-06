<?php 
include '../../functions/functions.php';
if(!isset($_SESSION['admin'])){
header("Location: ../index.php");
}
$query = $db->query("SELECT * FROM pl_account_tbl WHERE id = ".$_SESSION['admin']);
$row = $query->fetch_object();
$name = $row->name;
$image = $row->image;
$email = $row->email;
$username = $row->username;
$gender = $row->gender;
?>

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
  <link rel="icon" type="text/css" href="../../images/logo.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/skin-yellow.min.css">
  <link rel="stylesheet" type="text/css" href="../../dist/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../../dist/sweetalert/themes/twitter/twitter.css">
  <script type="text/javascript" src="../../dist/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/logo.png" class="img-responsive"></span>
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
              <img src="../../<?php echo $image?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo$name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../<?php echo $image?>" class="img-circle" alt="User Image">
                <p><?php echo$name?></p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span> Manage Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view-books.php"><i class="fa fa-circle-o"></i> View Books</a></li>
            <li><a href="book-requests.php"><i class="fa fa-circle-o"></i> Book Requests</a></li>
            <li><a href="return-request.php"><i class="fa fa-circle-o"></i> Return Request</a></li>
            <li><a href="approved-request.php"><i class="fa fa-circle-o"></i> Approved Request</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> Manage Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view-students-account.php"><i class="fa fa-circle-o"></i> View Student Account</a></li>
            <li><a href="view-librarian-account.php"><i class="fa fa-circle-o"></i> View Librarian Account</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span> Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view-category.php"><i class="fa fa-circle-o"></i> View Category</a></li>
            <li><a href="view-branch.php"><i class="fa fa-circle-o"></i> View Branch</a></li>
            <li><a href="export-database.php"><i class="fa fa-circle-o"></i> Export Database</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i> Edit Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="#">Edit Profile</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      
        <div class="col-md-3 col-xs-12">
        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-image"></i> Profile Picture</h3>
            </div>
            <!-- /.box-header -->
            <?php edit_profile()?>
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data" data-parsley-validate>
              <div class="box-body">


                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo$_SESSION['admin']?>">
                  <img class="img-responsive" style="width:100%" src="../../<?php echo$image?>">
                </div>

                <div class="form-group">
                  <input type="file" class="form-control"  name="image" required>
                </div>

               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn-add-students" class="btn btn-primary flat"><i class="fa fa-check-circle"> Update Profile</i></button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          
          </div>

           <div class="col-md-9 col-xs-12">
        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-exclamation-circle"></i> General Information</h3>
            </div>
            <!-- /.box-header -->
            <?php edit_information()?>
            <!-- form start -->
            <form role="form" method="POST" data-parsley-validate>
              <div class="box-body">

                <div class="form-group">
                  <label for="StudentID">Username</label>
                  <input type="hidden" name="id" value="<?php echo$_SESSION['admin']?>">
                  <input type="text" class="form-control"  name="username" value="<?php echo$username?>" required>
                </div>

                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control"  name="name" value="<?php echo$name?>" required>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" name="email" value="<?php echo$email?>" required>
                </div>

                <div class="form-group">
                  <label for="Gender">Gender</label>
                  <select name="gender" class="form-control" style="width: 100%" required>
                  <option value="<?php echo$gender?>" selected="selected"><?php echo$gender?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn-edit-information" class="btn btn-primary flat"><i class="fa fa-check-circle"> Save Changes</i></button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          
          </div>

    </div>

      <div class="clearfix"></div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y')?> All rights reserved.
    <div class="clearfix"></div>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../dist/js/app.min.js"></script>
<script src="../../plugins/select2/select2.full.min.js"></script>
<script src="../../dist/js/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
   $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>
