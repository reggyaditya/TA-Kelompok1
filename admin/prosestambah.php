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
$jenismobil = $_POST['jenismobil'];
$nomor = $_POST['nomor'];
$jenis = $_POST['jenis'];




$c = mysqli_query($conn, "INSERT INTO kendaraan(jenismobil,nomor,jenis)
    value('$jenismobil','$nomor','$jenis')");

if ($c) {
  header("location:list.php");
}



?>