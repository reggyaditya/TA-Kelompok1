<?php
include "../conn.php";
session_start();
if ($_SESSION['level'] == 'admin') {
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM kendaraan WHERE id='$id'");
	if ($query) {
		echo "<script>alert('Data Berhasil dihapus!'); window.location = 'list.php'</script>";
	} else {
		echo "<script>alert('Data Gagal dihapus!'); window.location = 'list.php'</script>";
	}
} else {
	echo " <script> alert('Anda tidak memiliki akses!'); window.location ='list.php' </script>";
}
