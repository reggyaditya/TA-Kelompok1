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
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$user_id'");
if ($query) {
  echo "<script> alert('Data Berhasil dihapus!'); window.location = 'admin.php'</script>";
} else {
  echo "<script>alert('Data Gagal dihapus!'); window.location = 'admin.php'</script>";
}
?>