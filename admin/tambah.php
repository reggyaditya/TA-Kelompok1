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
          Form
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

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
                <h3 class="box-title"></h3>
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
              <div class="box-body">
                <title>Form Peminjaman Kendaraan</title>

                <?php if ($_SESSION['level'] == 'admin') { ?>
                  <meta charset="UTP-8">
                  <meta name="viewport content=" width=device-width, initial-scale=1.0">
                  <style>
                    .masuk {
                      background: #2C97DF;
                      color: white;
                      border-top: 0;
                      border-left: 0;
                      border-right: 0;
                      border-bottom: 5px solid #2A80B9;
                      padding: 1px 10px;
                      text-decoration: none;
                      font-family: sans-serif;
                      font-size: 11pt;
                      transform: translate(600%, 0);

                    }


                    .reset {

                      background: #FF007F;
                      color: white;
                      border-top: 1px solid red;
                      border-left: 0;
                      border-right: 0;
                      border-bottom: 5px solid red;
                      padding: 1px 10px;
                      text-decoration: none;
                      font-family: sans-serif;
                      font-size: 11pt;
                      transform: translate(700%, 0);

                    }

                    .note {
                      color: red;


                    }
                  </style>
                  </head>

                  <body>

                    <p class=note>NOTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;JENIS NO.POLISI = GANJIL/GENAP NO POLISI </p>
                    <?php
                    include 'koneksi.php';
                    echo "<form method=POST action=prosestambah.php>";
                    echo "<table>
               <tr>
            <td>Jenis Mobil</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><input type=text name=jenismobil class=form-control placeholder='Jenis Mobil' style=width:500%;></td>
        </tr>

        <tr>
            <td>No. Polisi</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td><input type=text name=nomor class=form-control placeholder='No. Polisi' style=width:500%;></td>
        </tr>

        <tr>
            <td>Jenis No. Polisi</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><input type=text name=jenis class=form-control placeholder='Jenis No.Polisi' style=width:500%;></td>
        </tr>
        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           
                           <td><input class=masuk type=submit value=Submit>
                            <input class=reset type=reset value=Reset> </td>
                           </tr>
                    </table>
                    </form>
                   ";
                    ?>
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
<?php } else {
                  echo 'Anda tidak memiliki akses !';
                } ?>
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