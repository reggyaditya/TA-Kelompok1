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
    <?php include "menu.php"; ?>

    <div class="content-wrapper">
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

      <section class="content">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h5 class="box-title">Data</h5>
                <div class="box-tools pull-right">
                  <form action='admin.php' method="POST">
                    <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="box-body">
                <?php
                $query1 = "SELECT * FROM user";
                if (isset($_POST['qcari'])) {
                  $qcari = mysqli_real_escape_string($koneksi, $_POST['qcari']);
                  $query1 = "SELECT * FROM user WHERE fullname LIKE '%$qcari%' OR username LIKE '%$qcari%'";
                }
                $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
                ?>
                <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        <center>No</center>
                      </th>
                      <th>
                        <center>Fullname</center>
                      </th>
                      <th>
                        <center>No Handphone</center>
                      </th>
                      <th>
                        <center>Level</center>
                      </th>
                      <th>
                        <center>Tools</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) {
                      echo "<tr>
                        <td><center>{$no}</center></td>
                        <td><center><a href='detail-admin.php?hal=edit&kd={$data['user_id']}'><span class='glyphicon glyphicon-user'></span> {$data['fullname']}</a></center></td>
                        <td><center>{$data['no_hp']}</center></td>
                        <td><center>";
                      if ($data['level'] == 'admin') {
                        echo "<span class='label label-success'>Admin</span>";
                      } else if ($data['level'] == 'user') {
                        echo "<span class='label label-info'>User</span>";
                      }
                      echo "</center></td>
                        <td><center>
                          <div id='thanks'>
                            <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip' title='Edit Admin' href='edit-admin.php?hal=edit&kd={$data['user_id']}'><span class='glyphicon glyphicon-edit'></span></a>
                            <a onclick='return confirm (\"Yakin hapus {$data['fullname']}?\");' class='btn btn-sm btn-danger tooltips' data-placement='bottom' data-toggle='tooltip' title='Hapus Admin' href='hapus-admin.php?hal=hapus&kd={$data['user_id']}'><span class='glyphicon glyphicon-trash'></a>
                          </div>
                        </center></td>
                      </tr>";
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="box-footer clearfix no-border">
                <a href="input-admin.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>
    <?php include "footer.php"; ?>
    <?php include "sidecontrol.php"; ?>
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../plugins/morris/morris.min.js"></script>
  <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../plugins/knob/jquery.knob.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <script src="../dist/js/app.min.js"></script>
  <script src="../dist/js/pages/dashboard.js"></script>
  <script src="../dist/js/demo.js"></script>
</body>

</html>