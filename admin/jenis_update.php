<?php
include '../koneksi.php';
$id = $_POST['id'];
$jenis_laundry = $_POST['jenis_laundry'];
$lama_proses = $_POST['lama_proses'];
$tarif = $_POST['tarif'];
mysqli_query($koneksi,"update jenis set jenis_laundry='$jenis_laundry', lama_proses='$lama_proses', tarif='$tarif' where id_jenis='$id'");
header("location:jenis_laundry.php");
?>
