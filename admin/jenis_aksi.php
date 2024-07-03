<?php
include '../koneksi.php';
$jenis_laundry = $_POST['jenis_laundry'];
$lama_proses = $_POST['lama_proses'];
$tarif = $_POST['tarif'];
mysqli_query($koneksi,"insert into jenis values('','$jenis_laundry','$lama_proses','$tarif')");
header("location:jenis_laundry.php");
?>
