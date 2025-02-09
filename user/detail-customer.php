<?php include "../conn.php"; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
}
if ($_SESSION['level'] != "user") {
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
                <h3 class="box-title">Detail Data Customer</h3>
                <!-- <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div> -->
              </div><!-- /.box-header -->
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$_GET[id]'");
              $data  = mysqli_fetch_array($query);
              ?>
              <div class="box-body">
                <div class="form-panel">
                  <table id="example" class="table table-hover table-bordered">
                    <tr>
                      <td>Id</td>
                      <td><?php echo $data['kd_cus']; ?></td>
                    </tr>
                    <tr>
                      <td width="250">Nama</td>
                      <td width="565" colspan="1"><?php echo $data['nama_cus']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                      <td>Kota</td>
                      <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                      <td>No Telepon</td>
                      </td>
                      <td><?php echo $data['no_telp']; ?></td>
                    </tr>
                    <tr>
                      <td>PIC</td>
                      </td>
                      <td><?php echo $data['pic']; ?></td>
                    </tr>
                    <tr>
                      <td>HP</td>
                      </td>
                      <td><?php echo $data['pic']; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      </td>
                      <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                      <td>Notes</td>
                      </td>
                      <td><?php echo $data['notes']; ?></td>
                    </tr>
                  </table>
                  <div class="text-right">
                    <a href="customer.php" class="btn btn-sm btn-warning">Kembali <i class="fa fa-arrow-circle-right"></i></a>

                  </div>
                </div>
              </div><!-- /.box-body -->
              <!-- <div class="box-footer clearfix no-border">
                  <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
                </div> -->
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