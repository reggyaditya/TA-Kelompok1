<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
//$password = sha1($password1);

// $username = mysqli_real_escape_string($username);
// $password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error=Username dan Password Kosong!');
} else if (empty($username)) {
	header('location:index.php?error=Username Kosong!');
} else if (empty($password)) {
	header('location:index.php?error=Password Kosong!');
}

$q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $username;
	$_SESSION['fullname'] = $row['fullname'];
    $_SESSION['email'] = $row['email'];
     $_SESSION['alamat'] = $row['alamat'];
    $_SESSION['gambar'] = $row['gambar'];	
    $_SESSION['level']  = $row['level'];
  
    
    if ($_SESSION['level'] == 'admin'){
        header('location:admin/index.php');
    } else if ($_SESSION['level'] == 'user'){
        header('location:user/index.php');
    }
 
	
} else {
	header('location:index.php?error=Anda Belum Terdaftar!');
}
?>