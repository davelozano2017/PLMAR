<?php 
include '../../functions/functions.php';
if(!isset($_SESSION['user'])){
header("Location: ../index.php");
}
$query = $db->query("SELECT * FROM pl_account_tbl WHERE id = ".$_SESSION['user']);
$row = $query->fetch_object();
$name = $row->name;
$image = $row->image;

$query = $db->query("SELECT * FROM pl_books_tbl WHERE id = ".$_GET['id']);
$row = $query->fetch_object();
$isbn = $row->isbn;
$title = $row->title;
$category = $row->category;
$author = $row->author;
$publisher = $row->publisher;
$status = $row->status;
$copies = $row->copies;
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
         <li><a href="home.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-book"></i> <span> Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="view-books.php"><i class="fa fa-circle-o"></i> View Books</a></li>
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
      <h1><i class="fa fa-file-text"></i> Book Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Manage Books</a></li>
        <li class="active"><a href="#">Add Books</a></li>
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
            <?php add_books()?>
            <!-- form start -->
            <form role="form" method="POST" data-parsley-validate>
              <div class="box-body">

                <div class="form-group">
                  <label for="ISBN">ISBN</label>
                  <p class="form-control"><?php echo$isbn?></p>
                </div>

                <div class="form-group">
                  <label for="title">Title</label>
                  <p class="form-control"><?php echo$title?></p>
                </div>

                <div class="form-group">
                  <label for="Category">Category</label>
                  <p class="form-control"><?php echo$category?></p>
                </div>

                <div class="form-group">
                  <label for="author">Author</label>
                  <p class="form-control"><?php echo$author?></p>
                </div>

                <div class="form-group">
                  <label for="Copies">Copies</label>
                  <p class="form-control"><?php echo$copies?></p>
                </div>

                <div class="form-group">
                  <label for="publisher">Publisher</label>
                  <p class="form-control"><?php echo$publisher?></p>
                </div>

                <div class="form-group">
                  <label for="publisher">Date of Published</label>
                  <p class="form-control"><?php echo$published_date?></p>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" style="resize:none;height:100px" name="description"><?php echo$description?></textarea>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?php 
                if($status == 'Unavailable') {
                  echo '<div class="alert alert-danger">This book is unavailable</div>';
                } else {
                  ?>
                  <a href="#" onClick="borrow(<?php echo$_GET['id']?>)" class="btn btn-primary"><i class="fa fa-check-circle"></i> Borrow this book</a>
                  <?php
                }
                ?>
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


   function borrow($id) {
    var id = $id;
    swal({
      title: "",
      text: "<h4>Are you sure you want to borrow this book?",
      type: "warning",
      html: true,
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, I'm sure!",
      closeOnConfirm: false
    },
    function(){
      location.href="borrow.php?id="+id;
    });
   }
</script>
</body>
</html>
