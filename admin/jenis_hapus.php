<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from jenis where id_jenis='$id'");
header("location:jenis_laundry.php");
?>
