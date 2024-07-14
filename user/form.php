<!DOCTYPE html>
<html>
<?php
include "../conn.php";
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
}
if ($_SESSION['level'] != "user") {
    echo "<script>alert('Terjadi Ketidaksinkronisasi.'); window.location = '../loginout.php'</script>";
}
?>
<?php include "head.php"; ?>

<style>
    .mydiv {
        text-align: center;

    }

    .mydiv .btn {
        margin: 5px;
    }
</style>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <?php include "header.php"; ?>
        <?php include "menu.php"; ?>
        <?php include "waktu.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ol>
                <br>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>
                                <h3 class="box-title">Formulir Peminjaman Kendaraan Operasional</h3>
                            </div>
                            <div class="box-body">
                                <form method="POST" action="proses.php" class="row g-3">
                                    <div class="col-md-6">
                                        <label for="namapemesan" class="form-label">Nama Pemesan</label>
                                        <input type="text" class="form-control" id="namapemesan" name="namapemesan" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="noTelp" class="form-label">No. Telp</label>
                                        <input type="text" class="form-control" id="noTelp" name="no_telp" placeholder="No. Telp" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="unit">Unit</label>
                                        <select name="unit" id="unit" class="form-control" required>
                                            <option value="">- Pilih Salah Satu -</option>
                                            <option value="Toyota Avanza">Toyota Avanza</option>
                                            <option value="Calya">Calya</option>
                                            <option value="APV Arena">APV Arena</option>
                                            <option value="Brio Satya">Brio Satya</option>
                                            <option value="Toyota Hiace">Toyota Hiace</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jeniskendaraan">Jenis Kendaraan</label>
                                        <select name="jeniskendaraan" id="jeniskendaraan" class="form-control" required>
                                            <option value="">- Pilih Salah Satu -</option>
                                            <option value="SUV">SUV</option>
                                            <option value="MVP">MVP</option>
                                            <option value="Mini Bus 20 Seat">Mini Bus 20 Seat</option>
                                            <option value="LCGC">LCGC</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hariTanggal" class="form-label">Hari / Tanggal</label>
                                        <input type="date" class="form-control" id="hariTanggal" name="haritgl" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="area">Area</label>
                                        <select name="area" id="area" class="form-control" required>
                                            <option value="">- Select Area -</option>
                                            <option value="ATD Plaza (Operasional)">ATD Plaza (Operasional)</option>
                                            <option value="Bambu Apus">Bambu Apus</option>
                                            <option value="Guntur">Guntur</option>
                                            <option value="Maruya">Maruya</option>
                                            <option value="TBS">TBS</option>
                                            <option value="Rawa Mangun">Rawa Mangun</option>
                                            <option value="TBS Operasional">TBS Operasional</option>
                                            <option value="Menara Thamrin">Menara Thamrin</option>
                                            <option value="Gd.Lintasarta Taman Tekno">Gd.Lintasarta Taman Tekno</option>
                                            <option value="Cluster Meruya Spot Serang">Cluster Meruya Spot Serang</option>
                                            <option value="DEMO - Area">DEMO - Area</option>
                                            <option value="Serang">Serang</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tempatStandby" class="form-label">Tempat Standby</label>
                                        <input type="text" class="form-control" id="tempatStandby" name="tempatStandby" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuStandby" class="form-label">Waktu Standby</label>
                                        <input type="time" class="form-control" id="waktuStandby" name="waktuStandby" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="divisi" class="form-label">Divisi</label>
                                        <input type="text" class="form-control" id="divisi" name="divisi" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jumlahPenumpang" class="form-label">Jumlah Penumpang</label>
                                        <input type="number" class="form-control" id="jumlahPenumpang" name="jumlahPenumpang" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuAwal" class="form-label">Waktu Awal</label>
                                        <input type="time" class="form-control" id="waktuAwal" name="waktuawal" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuAkhir" class="form-label">Waktu Akhir</label>
                                        <input type="time" class="form-control" id="waktuAkhir" name="waktuakhir" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <input type="text" class="form-control" id="catatan" name="catatan" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                                    </div>
                                    <div class="mydiv">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </form>
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

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>