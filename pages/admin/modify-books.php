<?php 
include '../../functions/functions.php';
if(!isset($_SESSION['admin'])){
header("Location: ../index.php");
}
$query = $db->query("SELECT * FROM pl_account_tbl WHERE id = ".$_SESSION['admin']);
$row = $query->fetch_object();
$name = $row->name;
$image = $row->image;

$query = $db->query("SELECT * FROM pl_books_tbl WHERE id = ".$_GET['id']);
$row = $query->fetch_object();
$isbn = $row->isbn;
$title = $row->title;
$category = $row->category;
$author = $row->author;
$copies = $row->copies;
$publisher = $row->publisher;
$published_date = $row->published_date;
$description = $row->description;
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
  <link rel="stylesheet" type="text/css" href="../../dist/css/jquery.ui.css">
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
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-book"></i> <span> Manage Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="view-books.php"><i class="fa fa-circle-o"></i> View Books</a></li>
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
      <h1><i class="fa fa-book"></i> Modify Books</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Manage Books</a></li>
        <li class="active"><a href="#">Modify Books</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <a class="btn btn-primary flat" href="view-books.php"><i class="fa fa-reply"></i> Back</a>
      </div>
    </div>
    <br>
    <div class="row">
      
        <div class="col-md-12 col-xs-12">
        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-exclamation-circle"></i> Book Information</h3>
            </div>
            <!-- /.box-header -->
            <?php modify_books()?>
            <!-- form start -->
            <form role="form" method="POST" data-parsley-validate>
              <div class="box-body">

                <div class="form-group">
                  <label for="ISBN">ISBN</label>
                  <input type="hidden" class="form-control" value="<?php echo$_GET['id']?>" name="id" required>
                  <input type="text" class="form-control" value="<?php echo$isbn?>" name="isbn" required>
                </div>

                <div class="form-group">
                  <label for="title">title</label>
                  <input type="text" class="form-control" value="<?php echo$title?>" name="title" required>
                </div>

                <div class="form-group">
                  <label for="Category">Category</label>
                  <select name="category" class="form-control" required="required" >
                     <option value="<?php echo $row->category?>" selected><?php echo $row->category?></option>';
                      <?php
                      $query = $db->query("SELECT category FROM pl_books_category_tbl");
                      while ($row = $query->fetch_object()){
                      echo '<option value="'.$row->category.'">'.$row->category.'</option>';
                      }
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="author">Author</label>
                  <input type="text" class="form-control" value="<?php echo$author?>"  name="author" required>
                </div>

                <div class="form-group">
                  <label for="Copies">Copies</label>
                  <input type="number" class="form-control" value="<?php echo$copies?>"  name="copies" required>
                </div>

                <div class="form-group">
                  <label for="publisher">Publisher</label>
                  <input type="text" class="form-control"  name="publisher" value="<?php echo$publisher?>" required>
                </div>

                <div class="form-group">
                  <label for="publisher">Date of Published</label>
                  <input type="text" id="datepicker" class="form-control"  value="<?php echo$published_date?>" name="published_date" required>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" style="resize:none" name="description" required><?php echo$description?></textarea>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn-edit-books" class="btn btn-primary flat"><i class="fa fa-check-circle"> Save Changes</i></button>
                <button type="submit" name="btn-delete-books" class="btn btn-danger flat"><i class="fa fa-trash"> Delete Book</i></button>
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
<script src="../../dist/js/jquery-ui.js"></script>
<script src="../../plugins/select2/select2.full.min.js"></script>
<script src="../../dist/js/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
   $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });

   $( function() {
    $( "#datepicker" ).datepicker({  maxDate: '0'});
  } );
</script>
</body>
</html>
