<?php
include '../koneksi.php';

$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$jenis_laundry = $_POST['jenis_laundry'];
$status = $_POST['status'];

// Retrieve the tariff from the jenis table
$jenis_query = mysqli_query($koneksi, "SELECT tarif FROM jenis WHERE id_jenis = '$jenis_laundry'");
$jenis_data = mysqli_fetch_assoc($jenis_query);
$tarif = $jenis_data['tarif'];

// Calculate the total price
$harga = $berat * $tarif;

// Update the transaksi table
mysqli_query($koneksi, "UPDATE transaksi SET transaksi_pelanggan='$pelanggan', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status', transaksi_harga='$harga', id_jenis='$jenis_laundry' WHERE transaksi_id='$id'");

// Delete existing pakaian records for this transaction
mysqli_query($koneksi, "DELETE FROM pakaian WHERE pakaian_transaksi='$id'");

// Insert updated pakaian records
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];
for ($x = 0; $x < count($jenis_pakaian); $x++) {
    if ($jenis_pakaian[$x] != "") {
        mysqli_query($koneksi, "INSERT INTO pakaian (pakaian_transaksi, pakaian_jenis, pakaian_jumlah) VALUES ('$id', '$jenis_pakaian[$x]', '$jumlah_pakaian[$x]')");
    }
}

header("location:transaksi.php");
?>
