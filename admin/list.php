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
<?php include "head.php" ?>
</head>

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

        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">List Kendaraan</li>
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
                $cek = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id='$id'");
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
              <style>
                .tambah {

                  font-weight: bold;
                  font-family: Arial;
                  font-size: 120%;


                }

                a.type9:link {
                  text-decoration: none;
                  color: black;
                }

                a.type9:visited {
                  color: grey;
                }

                a.type9:hover {
                  -webkit-filter: blur(1px) grayscale(1);
                  opacity: .8;
                  /* fallback */
                }

                .update {
                  text-decoration: none;
                  color: DarkGreen;
                  background-color: orange;
                  font-family: arial;
                  font-weight: bold;
                  line-height: 50px;
                  margin: auto;
                  padding: 3px;
                  border-radius: 5px;


                }

                .update:hover {
                  color: white;
                }

                .delete {
                  text-decoration: none;
                  color: red;
                  background-color: orange;
                  font-family: arial;
                  font-weight: bold;
                  line-height: 50px;
                  margin: auto;
                  padding: 3px;
                  border-radius: 5px;


                }

                .delete:hover {
                  color: white;
                }
              </style>





              <section class="col-lg-12 connectedSortable">

                <div class="box box-primary">
                  <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">List Kendaraan</h3>
                    <div class="box-tools pull-right">

                    </div>
                  </div><!-- /.box-header -->
                  <div class="scroller box-body">

                    <div class="box-footer clearfix no-border">
                      <a href="tambah.php" class="btn btn-sm btn-default pull-left"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>

                    <table id="example" class="table table-responsive table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>
                            <center>Id.</center>
                          </th>
                          <th>
                            <center>Jenis Mobil</center>
                          </th>
                          <th>
                            <center>No.Polisi</center>
                          </th>
                          <th>
                            <center>Jenis No. Polisi</center>
                          </th>
                          <th>
                            <center>Action</center>
                          </th>

                        </tr>


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
                                  <td><a class=update href='update-list.php?id=" . $rows['id'] . "'>UPDATE</a>&nbsp;&nbsp;&nbsp;
                                  <a class=delete href='delete-kendaraan.php?id=" . $rows['id'] . "'>DELETE</a>&nbsp;&nbsp;&nbsp;
                                  
                              
                                
                                </tr>";
                          $nomorgan++;
                        }
                        echo "</table>";
                        ?>


                      </thead>

              </section>

            </div><!-- /.box-body -->
            <div class="box-footer clearfix no-border">
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
  <script type="text/javascript">
    function setUpdateAction() {
      document.frmUser.action = "edit-multi-customer.php";
      document.frmUser.submit();
    }

    function setDeleteAction() {
      if (confirm("Anda yakin hapus data yang di pilih?")) {
        document.frmUser.action = "delete-multi-customer.php";
        document.frmUser.submit();
      }
    }
  </script>
</body>

</html>