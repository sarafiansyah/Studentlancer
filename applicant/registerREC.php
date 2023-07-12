<?php
require_once("../include/initialize.php");

?>
<?php
// login confirmation
if (isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "applicant/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ERIS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo web_root; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo web_root; ?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo web_root; ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo web_root; ?>plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!--   <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div> -->
        <!-- /.login-logo -->
        <div class="login-box-body" style="min-height: 400px;">
            <h1 class="login-box-msg">Register to S-REC</h1>
            <hr />
            <p><?php check_message(); ?></p>

            <form method="post" action="processREC.php">
                <div class="form-group has-feedback">
                    <input type="text" name="userid" hidden placeholder="User ID">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="role" placeholder="Role" value="Administrator" hidden required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="piclocation" placeholder="Picture Location" hidden value="photos/default.jpg" required>
                </div>
                <div class="row">

                    <div class="col-xs-4">
                        <button type="submit" value="Register" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>

                </div>
                <!-- /.col -->
        </div>
        </form>

        <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
        <!-- /.social-auth-links -->

        <!--    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
    </div>

    <!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo web_root; ?>plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>