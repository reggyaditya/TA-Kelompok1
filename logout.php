<?php
session_start();
session_destroy();	

    echo "<script>alert('Anda telah  Berhasil keluar.'); window.location = 'index.php'</script>";
?>