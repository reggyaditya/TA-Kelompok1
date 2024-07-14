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

$id = $_POST['id'];
$haritgl = $_POST['haritgl'];
$namapemesan = $_POST['namapemesan'];
$area = $_POST['area'];
$divisi = $_POST['divisi'];
$tujuan = $_POST['tujuan'];
$jumlahpenumpang = $_POST['jumlahpenumpang'];
$waktuawal = $_POST['waktuawal'];
$waktuakhir = $_POST['waktuakhir'];
$catatan = $_POST['catatan'];


$query = "UPDATE customer SET id='$id', haritgl='$haritgl',
    namapemesan='$namapemesan',area='$area',divisi='$divisi',tujuan='$tujuan',jumlahpenumpang='$jumlahpenumpang',waktuawal='$waktuawal',waktuakhir='$waktuakhir',catatan='$catatan' WHERE id='$id'";

$test = mysqli_query($conn, $query);

if ($query) {
  header("Location:customer.php");
}

?>