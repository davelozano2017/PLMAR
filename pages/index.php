<?php include '../functions/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pamantasan ng lungsod ng Marikina</title>
  <link rel="icon" type="text/css" href="../images/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
<!-- sweet alert -->
  <link rel="stylesheet" type="text/css" href="../dist/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../dist/sweetalert/themes/twitter/twitter.css">
  <script type="text/javascript" src="../dist/sweetalert/dist/sweetalert.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style type="text/css">
  .book-background {
    background:url(../images/background.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
  }
</style>
<body class="hold-transition login-page book-background">
<div class="login-box">
  <div class="login-logo">
    <img style="margin:auto" src="../images/logo.png" class="img-responsive"> 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Pamantasan ng Lungsod ng Marikina</p>
<?php login();?>
    <form method="post" data-parsley-validate>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Student ID or username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="btn-login" class="btn btn-primary btn-flat">Sign In <i class="fa fa-sign-in"></i> </button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/parsleyjs/dist/parsley.min.js"></script>
</body>
</html>
