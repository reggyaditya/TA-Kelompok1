<?php include "../conn.php";?>
<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
}
if($_SESSION['level']!="admin"){
  echo "<script>alert('Terjadi Ketidaksinkronisasi.'); window.location = '../loginout.php'</script>";
}
?>
<?php
include ("koneksi.php");

    $id=$_POST['id'];
    $jenismobil=$_POST['jenismobil'];
    $nomor=$_POST['nomor'];
    $jenis=$_POST['jenis'];


  
    $query = "UPDATE kendaraan SET id='$id', jenismobil='$jenismobil',
    nomor='$nomor',jenis='$jenis' WHERE id='$id'";
    
    $test=mysqli_query($conn, $query);

    if($query){
        header("Location:list.php");
    }

?>