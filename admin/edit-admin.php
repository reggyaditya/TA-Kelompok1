<?php include "../conn.php"; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
}
if ($_SESSION['level'] != "admin") {
  echo "<script>alert('Terjadi Ketidaksinkronisasi.'); window.location = '../loginout.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">

    <?php include "header.php"; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include "menu.php"; ?>

    <?php include "waktu.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Admin
          <small>Aplikasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Admin</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">

            <!-- TO DO List -->
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Data Admin</h3>
                <div class="box-tools pull-right">

                </div>
              </div><!-- /.box-header -->
              <?php

              $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$_GET[kd]'");
              $data  = mysqli_fetch_array($query);
              ?>
              <div class="box-body">
                <?php if ($_SESSION['level'] == 'admin') { ?>
                  <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->
                  <div class="form-panel">
                    <form class="form-horizontal style-form" action="update-admin.php" method="post" name="form1" id="form1">
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">User ID</label>
                        <div class="col-sm-10">
                          <input name="user_id" type="text" id="user_id" class="form-control" value="<?php echo $data['user_id']; ?>" readonly="readonly" autofocus="on" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['username']; ?>" required />
                          <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input name="password" type="text" id="password" class="form-control" value="<?php echo $data['password']; ?>" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Fullname</label>
                        <div class="col-sm-10">
                          <input name="fullname" class="form-control" id="fullname" type="text" value="<?php echo $data['fullname']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                          <input name="email" class="form-control" id="email" type="text" value="<?php echo $data['email']; ?>" autocomplete="off" required />
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-8">
                          <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data['alamat']; ?>" autocomplete="off" required />
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">No Handphone</label>
                        <div class="col-sm-10">
                          <input name="no_hp" class="form-control" id="no_hp" type="text" value="<?php echo $data['no_hp']; ?>" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Level</label>
                        <div class="col-sm-3">
                          <select name="level" class="form-control" required>
                            <option value=""> -- Pilih Level -- </option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <!--<option value="superuser">Superuser</option>
                            <option value="user">User</option>-->
                          </select>
                        </div>
                        <label class="col-sm-3 col-sm-3 control-label">Level Sebelumnya : </label>
                        <div class="col-sm-3">
                          <span class="label label-primary"><?php echo $data['level'];  ?></span>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                        <div class="col-sm-10">
                          <img src="<?php echo $data['gambar']; ?>" width="200" height="250" class="img-rounded" style="border: 3px solid #888;" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                          <input type="submit" value="Simpan Data" class="btn btn-sm btn-primary" />&nbsp;
                          <a href="admin.php" class="btn btn-sm btn-danger">Batal </a>
                        </div>
                      </div>
                    </form>
                  </div>
                <?php } else {
                  echo 'Anda tidak memiliki akses !';
                } ?>
              </div><!-- /.box-body -->
              <div class="box-footer clearfix no-border">
                <a href="input-admin.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
              </div>
            </div><!-- /.box -->

          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "footer.php"; ?>

    <?php include "sidecontrol.php"; ?>
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="../plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
</body>

</html>