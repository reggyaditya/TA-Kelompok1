<?php include "../conn.php" ?>

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
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>List</h3>
                <p>Nama Pemesan</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->

          <?php /** $tampil1=mysqli_query($koneksi, "select * from produk order by kd_produk desc");
                        $total1=mysqli_num_rows($tampil1);
           */ ?>
          <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3 style="font-size:260%"><?php echo "List" ?><!--<sup style="font-size: 20px">%</sup>--> </h3>
                <p>List Kendaraan</p>
              </div>
              <div class="icon">
                <i class="fa fa-car"></i>
              </div>
              <a href="list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->


          <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo "Form"; ?></h3>
                <p>Form Peminjaman</p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="form.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->


          <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo "You're"; ?></h3>
                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-spin fa-refresh"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->






        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- TO DO List -->
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">List Kendaraan </h3>
                <div class="box-tools pull-right">

                </div>
              </div><!-- /.box-header -->

              <div class="scroller box-body">
                <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->


                <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        <center>Id</center>
                      </th>
                      <th>
                        <center>Jenis Mobil</center>
                      </th>
                      <th>
                        <center>No. Polisi </center>
                      </th>
                      <th>
                        <center>Jenis No. Polisi</center>
                      </th>
                    </tr>
                  </thead>

                  <?php
                  $a = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                  $b = mysqli_num_rows($a);
                  $nomorgan = 1;
                  while ($rows = mysqli_fetch_array($a)) {

                    echo "
                    <tr align=center>
                    <td>" . $nomorgan . "</td>
                    <td>" . $rows['jenismobil'] . "</td>
                    <td>" . $rows['nomor'] . "</td>
                    <td>" . $rows['jenis'] . "</td>
                    
                 
                  
                  </tr>";
                    $nomorgan++;
                  }
                  echo "</table>";
                  ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
              <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
            </div><!-- /.box -->

          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">List Nama Pemesan</h3>
                <div class="box-tools pull-right">

                </div>
              </div><!-- /.box-header -->
              <div class="scroller box-body">

                <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        <center>Id.</center>
                      </th>
                      <th>
                        <center>Hari/ Tanggal</center>
                      </th>
                      <th>
                        <center>Nama Pemesan</center>
                      </th>
                      <th>
                        <center>Divisi</center>
                      </th>
                      <th>
                        <center>Tujuan</center>
                      </th>
                      <th>
                        <center>Unit </center>
                      </th>
                      <th>
                        <center>Waktu Awal</center>
                      </th>
                      <th>
                        <center>Waktu Akhir</center>
                      </th>
                      <th>
                        <center>Catatan</center>
                      </th>


                      <?php
                      $a = mysqli_query($koneksi, "SELECT * FROM customer");
                      // $c = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                      $b = mysqli_num_rows($a);
                      $nomorgan = 1;
                      while ($rows = mysqli_fetch_array($a)) {

                        echo "
                     <tr align=center>
                     <td>" . $nomorgan . "</td>
                     <td>" . $rows['haritgl'] . "</td>
                     <td>" . $rows['namapemesan'] . "</td>
                     <td>" . $rows['divisi'] . "</td>
                     <td>" . $rows['tujuan'] . "</td>
                     <td>" . $rows['unit'] . "</td>
                     <td>" . $rows['waktuawal'] . "</td>
                     <td>" . $rows['waktuakhir'] . "</td>
                     <td>" . $rows['catatan'] . "</td>
                    
                 
                  
                  </tr>";
                        $nomorgan++;
                      }
                      echo "</table>";
                      ?>

                    </tr>
                  </thead>



                  </tbody>
                </table>
              </div><!-- /.box-body -->
              <!--<div class="box-footer clearfix no-border">
                  <a href="input-kategori.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
                  </div>-->
            </div>






          </section><!-- right col -->
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