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
<style>
  .btn {
    margin: 3px;
    /* Tambahkan jarak antar tombol */
  }
</style>
</head>

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
          Daftar Nama Pemesan
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Daftar Nama Pemesan</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">

            <div class="box-body">
              <?php
              if (isset($_GET['aksi']) == 'delete') {
                $id = $_GET['id'];
                $cek = mysqli_query($koneksi, "SELECT * FROM form WHERE id='$id'");
                if (mysqli_num_rows($cek) == 0) {
                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                } else {
                  $delete = mysqli_query($koneksi, "DELETE FROM form WHERE id='$id'");
                  if ($delete) {
                    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                  } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                  }
                }
              }
              ?>

              <section class="col-lg-12 connectedSortable">

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
                            <center>Unit</center>
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
                          <th>
                            <center>Action</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $a = mysqli_query($koneksi, "SELECT * FROM customer");
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
                            <td>
                              <a href='update-customer.php?id=" . $rows['id'] . "' class='btn btn-warning btn-action'>Update</a>
                              <a href='delete.php?id=" . $rows['id'] . "' class='btn btn-danger btn-action'>Delete</a>
                              <a href='print.php?id=" . $rows['id'] . "' class='btn btn-primary btn-action'>Approve</a>
                            </td>
                          </tr>";
                          $nomorgan++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
                  <div class="box-footer clearfix no-border"></div>
                </div><!-- /.box -->

              </section><!-- /.Left col -->
            </div><!-- /.row (main row) -->

          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php include "sidecontrol.php"; ?>
        <!-- <?php include "footer.php" ?> -->
        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script type="text/javascript"></script>
</body>

</html>