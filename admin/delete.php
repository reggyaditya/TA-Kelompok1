<?php
session_start();
if ($_SESSION['level'] == 'admin') {
	include "../conn.php";
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM customer WHERE id='$id'");
	if ($query) {
		echo "<script>alert('Data Berhasil dihapus!'); window.location = 'customer.php'</script>";
	} else {
		echo "<script>alert('Data Gagal dihapus!'); window.location = 'customer.php'</script>";
	}
} else {
	echo " <script> alert('Anda tidak memiliki akses!'); window.location ='customer.php' </script>";
}
