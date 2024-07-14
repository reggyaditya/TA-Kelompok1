<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMOD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

</head>

<body class="hold-transition" background="dist/img/pj3.jpg">
  <div class="login-box">
    <div class="login-logo">
      <a href="#" style="color: black;"> <!-- <span class="glyphicon glyphicon-qrcode"></span> --> Sistem Informasi Peminjaman Mobil Dinas</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

      <p class="login-box-msg"><?php if (isset($_GET['error'])) {
                                  echo
                                  "<div class='alert alert-danger alert-gradient alert-dismissible fade in' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>x</span></button>
                            <strong>Error!</strong> $_GET[error]
                          </div>";
                                } else {
                                  echo "";
                                } ?></p>
      <form action="proseslogin.php" id="login" name="login" method="post">
        <div class="form-group has-feedback">
          <input type="text" id="username" name="username" class="form-control" autocomplete="off" placeholder="Username" required="required">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class=recaptcha>
          <div class="g-recaptcha">&nbsp;&nbsp;&nbsp;<input type="checkbox" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I'm not a robot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width=22% src=recaptcha.png></div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div><!-- /.col -->
        </div>
      </form>

      <center>
        <h5 class="form-signin">Made By <a href="#" data-toggle="modal" data-target="#contact">Kelompok 1</a></h5>
      </center>
      <br>


    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
  <style>
    .recaptcha {
      background-color: #f9f9f9;
      border-radius: 0%;
      border: 2px solid #d3d3d3;
      font-size: 130%;
      color: black;

    }
  </style>

  <!-- Modal Dialog Contact -->
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><b>Hai Apa Kabar??</b></h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td>Terima Kasih Telah Menggunakan Aplikasi Ini.
                <br> &copy; 2024.
              </td>
            </tr>

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end dialog modal -->

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
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