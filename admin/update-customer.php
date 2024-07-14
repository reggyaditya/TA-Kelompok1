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
          Update
          <small>Aplikasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Update List</li>
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
                <h3 class="box-title">Update List</h3>
                <div class="box-tools pull-right">

                </div>
              </div><!-- /.box-header -->
              <?php
              $id = $_GET['id'];
              $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE id='$id'");
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
                    <form class="form-horizontal style-form" action="prosesupdate-customer.php" method="post" name="form1" id="form1">
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"> ID</label>
                        <div class="col-sm-10">
                          <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id']; ?>" readonly="readonly" autofocus="on" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hari/ Tanggal</label>
                        <div class="col-sm-10">
                          <input name="haritgl" type="text" id="haritgl" class="form-control" value="<?php echo $data['haritgl']; ?>" required />
                          <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Pemesan</label>
                        <div class="col-sm-10">
                          <input name="namapemesan" type="text" id="namapemesan" class="form-control" value="<?php echo $data['namapemesan']; ?>" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Area</label>
                        <div class="col-sm-10">
                          <input name="area" class="form-control" id="area" type="text" value="<?php echo $data['area']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                        <div class="col-sm-10">
                          <input name="unit" class="form-control" id="unit" type="unit" value="<?php echo $data['unit']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-10">
                          <input name="tujuan" class="form-control" id="tujuan" type="text" value="<?php echo $data['tujuan']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Divisi</label>
                        <div class="col-sm-10">
                          <input name="divisi" class="form-control" id="divisi" type="text" value="<?php echo $data['divisi']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Penumpang</label>
                        <div class="col-sm-10">
                          <input name="jumlahpenumpang" class="form-control" id="jumlahpenumpang" type="text" value="<?php echo $data['jumlahpenumpang']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Waktu Awal</label>
                        <div class="col-sm-10">
                          <input name="waktuawal" class="form-control" id="waktuawal" type="text" value="<?php echo $data['waktuawal']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Waktu Akhir</label>
                        <div class="col-sm-10">
                          <input name="waktuakhir" class="form-control" id="waktuakhir" type="text" value="<?php echo $data['waktuakhir']; ?>" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Catatan</label>
                        <div class="col-sm-10">
                          <input name="catatan" class="form-control" id="catatan" type="text" value="<?php echo $data['catatan']; ?>" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                          <input type="submit" value="Simpan Data" class="btn btn-sm btn-primary" />&nbsp;
                          <a href="customer.php" class="btn btn-sm btn-danger">Batal </a>
                        </div>
                      </div>
                    </form>
                  </div>
                <?php } else {
                  echo " <script> alert('Anda tidak memiliki akses!'); window.location ='customer.php' </script>";
                } ?>
              </div><!-- /.box-body -->


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