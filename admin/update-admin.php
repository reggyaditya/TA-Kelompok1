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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $level = $_POST['level'];

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare the query
  $stmt = $koneksi->prepare("UPDATE user SET username=?, password=?, fullname=?, email=?, alamat=?, no_hp=?, level=? WHERE user_id=?");
  $stmt->bind_param("sssssssi", $username, $hashed_password, $fullname, $email, $alamat, $no_hp, $level, $user_id);

  if ($stmt->execute()) {
    header('Location: admin.php');
    exit;
  } else {
    echo "Gagal: " . $stmt->error;
  }

  $stmt->close();
}
