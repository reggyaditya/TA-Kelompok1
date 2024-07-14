<?php
session_start();
if ($_SESSION['level'] == "admin") {
	include "../conn.php";
} else if ($_SESSION['level'] == "user") {
	include "../conn.php";
} else if ($_SESSION['level'] == "superuser") {
	header('location:../index.php');
} else {
    header('location:../index.php');
}
?>
