<!DOCTYPE html>

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
                <!-- <h1>Form Peminjaman Kendaraan Operasional</h1> -->
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
                                <h3 class="box-title">Formulir Peminjaman Kendaraan Operasional</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $today = date("d/M/Y");
                                ?>
                                <form method="POST" action="proses.php" class="row g-3">
                                    <div class="col-md-6">
                                        <label for="namaPemohon" class="form-label">Nama Pemesan</label>
                                        <input type="text" class="form-control" id="namaPemohon" name="nama" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="noTelp" class="form-label">No. Telp</label>
                                        <input type="text" class="form-control" id="noTelp" name="no_telp" placeholder="No. Telp" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bagian" class="form-label">Unit</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bagianTK" name="bagian[]" value="Toyota Avanza">
                                            <label class="form-check-label" for="bagianTK">Toyota Avanza</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bagianSD" name="bagian[]" value="Calya">
                                            <label class="form-check-label" for="bagianSD">Calya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bagianSMP" name="bagian[]" value="APV Arena">
                                            <label class="form-check-label" for="bagianSMP">APV Arena</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bagianSMA" name="bagian[]" value="Brio Satya">
                                            <label class="form-check-label" for="bagianSMA">Brio Satya</label>
                                        </div>
                                        <div style="color:red;"><b>NOTE: PASTIKAN ANDA CHECKLIST SALAH SATU </b></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="jenisKendaraan" class="form-label">Jenis Kendaraan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jenisAvanza" name="jenis[]" value="SUV">
                                            <label class="form-check-label" for="jenisAvanza">SUV</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jenisAPV" name="jenis[]" value="MVP">
                                            <label class="form-check-label" for="jenisAPV">MVP</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jenisBus20" name="jenis[]" value="Bus 20 Seat">
                                            <label class="form-check-label" for="jenisBus20">Mini Bus 20 Seat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jenisBus45" name="jenis[]" value="Bus 45 Seat">
                                            <label class="form-check-label" for="jenisBus45">Mini Bus 45 Seat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jenisAvanza" name="jenis[]" value="LCGC">
                                            <label class="form-check-label" for="jenisAvanza">LCGC</label>
                                        </div>
                                        <div style="color:red;"><b>NOTE: PASTIKAN ANDA CHECKLIST SALAH SATU </b></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hariTanggal" class="form-label">Hari / Tanggal</label>
                                        <input type="date" class="form-control" id="hariTanggal" name="haritgl" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="alamat" class="form-label">Area</label>
                                        <input type="text" class="form-control" id="area" name="area" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tempatStandby" class="form-label">Tempat Standby</label>
                                        <input type="text" class="form-control" id="tempatStandby" name="tempatstandby" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuStandby" class="form-label">Waktu Standby</label>
                                        <input type="time" class="form-control" id="waktuStandby" name="waktustandby" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kegiatan" class="form-label">Divisi</label>
                                        <input type="text" class="form-control" id="divisi" name="divisi" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jumlahPeserta" class="form-label">Jumlah Penumpang</label>
                                        <input type="number" class="form-control" id="jumlahPenumpang" name="jumlahpenumpang" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuAwal" class="form-label">Waktu Awal</label>
                                        <input type="time" class="form-control" id="waktuAwal" name="waktuawal" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktuAkhir" class="form-label">Waktu Akhir</label>
                                        <input type="time" class="form-control" id="waktuAkhir" name="waktuakhir" required>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mx-2">Submit</button>
                                        <button type="reset" class="btn btn-secondary mx-2">Reset</button>
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
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>