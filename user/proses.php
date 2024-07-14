<?php

// Detail koneksi MySQL
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_peminjaman";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data POST
$namapemesan = $_POST['namapemesan'];
$no_telp = $_POST['no_telp'];
$divisi = $_POST['divisi'];
$waktuawal = $_POST['waktuawal'];
$waktuakhir = $_POST['waktuakhir'];
$haritgl = $_POST['haritgl'];
$tujuan = $_POST['tujuan'];
$area = $_POST['area'];
$tempatstandby = $_POST['tempatstandby'];
$jumlahpenumpang = $_POST['jumlahpenumpang'];
$jenis = $_POST['jenis'];
$waktustandby = $_POST['waktustandby'];
$catatan = $_POST['catatan'];
$unit = $_POST['unit'];





$sql = "INSERT INTO customer (namapemesan, no_telp, divisi, waktuawal, waktuakhir, haritgl, tujuan, area, tempatstandby, jumlahpenumpang, jenis, waktustandby, catatan, unit)
        VALUES ('$namapemesan', '$no_telp', '$divisi', '$waktuawal', '$waktuakhir', '$haritgl', '$tujuan', '$area', '$tempatstandby', '$jumlahpenumpang', '$jenis', '$waktustandby', '$catatan', '$unit')";
$b = mysqli_query($koneksi, $sql);

if ($b) {
    header("location:customer.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
