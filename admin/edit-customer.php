<?php
include "../conn.php";
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
  exit;
}
if ($_SESSION['level'] != "admin") {
  echo "<script>alert('Terjadi Ketidaksinkronisasi.'); window.location = '../loginout.php'</script>";
  exit;
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Customer
          <small>Aplikasi Invoice</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Customer</li>
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
                <h3 class="box-title">Edit Data Customer</h3>
              </div><!-- /.box-header -->

              <?php
              if (isset($_GET['id'])) {
                $kd = $_GET['id'];
                $sql = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$kd'");
                if (mysqli_num_rows($sql) == 0) {
                  header("Location: customer.php");
                } else {
                  $row = mysqli_fetch_assoc($sql);
                }
              }

              if (isset($_POST['update'])) {
                $kd_cus    = $_POST['kd_cus'];
                $nama_cus = $_POST['nama_cus'];
                $alamat   = $_POST['alamat'];
                $kota     = $_POST['kota'];
                $no_telp  = $_POST['no_telp'];
                $pic      = $_POST['pic'];
                $hp       = $_POST['hp'];
                $email    = $_POST['email'];
                $notes    = $_POST['notes'];

                $update = mysqli_query($koneksi, "UPDATE customer SET nama_cus='$nama_cus', alamat='$alamat', kota='$kota', no_telp='$no_telp', pic='$pic', hp='$hp', email='$email', notes='$notes' WHERE kd_cus='$kd'") or die(mysqli_error($koneksi));
                if ($update) {
                  echo "<script>window.location = 'customer.php'</script>";
                } else {
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                }
              }
              ?>

              <div class="box-body">
                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-4">
                      <input name="kd_cus" type="text" id="kd_cus" class="form-control" value="<?php echo $row['kd_cus']; ?>" placeholder="Auto Number" autocomplete="off" readonly />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Customer</label>
                    <div class="col-sm-4">
                      <input name="nama_cus" type="text" id="nama_cus" class="form-control" value="<?php echo $row['nama_cus']; ?>" placeholder="Nama Customer" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                      <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" placeholder="Alamat" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kota</label>
                    <div class="col-sm-4">
                      <input name="kota" type="text" id="kota" class="form-control" value="<?php echo $row['kota']; ?>" placeholder="Kota" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Telepon</label>
                    <div class="col-sm-4">
                      <input name="no_telp" type="text" id="no_telp" class="form-control" value="<?php echo $row['no_telp']; ?>" placeholder="No Telepon" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">PIC</label>
                    <div class="col-sm-4">
                      <input name="pic" type="text" id="pic" class="form-control" value="<?php echo $row['pic']; ?>" placeholder="Person In Charge" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">HP</label>
                    <div class="col-sm-4">
                      <input name="hp" type="text" id="hp" class="form-control" value="<?php echo $row['hp']; ?>" placeholder="No HP" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                      <input name="email" type="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Email" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Notes</label>
                    <div class="col-sm-4">
                      <input name="notes" type="text" id="notes" class="form-control" value="<?php echo $row['notes']; ?>" placeholder="Notes" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                      <a href="customer.php" class="btn btn-sm btn-danger">Batal</a>
                    </div>
                  </div>
                </form>
              </div><!-- /.box-body -->
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
  <script src="../css/jquery-ui.min.js"></script>
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