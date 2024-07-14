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
<?php
include("koneksi.php");
$namapemesan = $_POST['namapemesan'];
$no_telp = $_POST['no_telp'];
$divisi = $_POST['divisi'];
$waktuawal = $_POST['waktuawal'];
$waktuakhir = $_POST['waktuakhir'];
$haritgl = $_POST['haritgl'];
$area = $_POST['area'];
$catatan = $_POST['catatan'];
$tempatstandby = $_POST['tempatstandby'];
$jumlahpenumpang = $_POST['jumlahpenumpang'];
$waktustandby = $_POST['waktustandby'];
$jenis = $_POST['jenis'];



$b = mysqli_query($conn, "INSERT INTO customer(namapemesan,no_telp, divisi, waktuawal ,waktuakhir,haritgl,area,kegiatan,tempatstandby,jumlahpenumpang,waktustandby,jenis)
    value('$namapemesan','$no_telp','$divisi','$waktuawal','$waktuakhir','$haritgl','$area','$kegiatan','$tempatstandby','$jumlahpenumpang','$waktustandby','$jenis')");

if ($b) {
  header("location:customer.php");
}



?>