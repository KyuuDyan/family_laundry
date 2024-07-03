<?php
include '../koneksi.php';

// Retrieve form data
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$jenis_laundry = $_POST['jenis_laundry']; // Assuming you have an input field in your form for this
$tgl_hari_ini = date('Y-m-d');
$status = 0;

// Retrieve the tariff from the jenis table
$jenis_query = mysqli_query($koneksi, "SELECT tarif FROM jenis WHERE id_jenis = '$jenis_laundry'");
$jenis_data = mysqli_fetch_assoc($jenis_query);
$tarif = $jenis_data['tarif'];

// Calculate the total price
$harga = $berat * $tarif;

// Insert data into the transaksi table
mysqli_query($koneksi, "INSERT INTO transaksi (transaksi_tgl, transaksi_pelanggan, transaksi_harga, transaksi_berat, transaksi_tgl_selesai, transaksi_status, id_jenis) VALUES ('$tgl_hari_ini', '$pelanggan', '$harga', '$berat', '$tgl_selesai', '$status', '$jenis_laundry')");
$id_terakhir = mysqli_insert_id($koneksi);

// Check if pakaian_jenis and pakaian_jumlah are set and not empty
if (isset($_POST['pakaian_jenis']) && is_array($_POST['pakaian_jenis']) && isset($_POST['pakaian_jumlah']) && is_array($_POST['pakaian_jumlah'])) {
    $pakaian_jenis = $_POST['pakaian_jenis'];
    $pakaian_jumlah = $_POST['pakaian_jumlah'];

    // Ensure both arrays have the same length
    if (count($pakaian_jenis) == count($pakaian_jumlah)) {
        for ($x = 0; $x < count($pakaian_jenis); $x++) {
            if ($pakaian_jenis[$x] != "") {
                mysqli_query($koneksi, "INSERT INTO pakaian (pakaian_transaksi, pakaian_jenis, pakaian_jumlah) VALUES ('$id_terakhir', '$pakaian_jenis[$x]', '$pakaian_jumlah[$x]')");
            }
        }
    } else {
        // Handle the error case where array lengths don't match
        echo "Error: Mismatched array lengths.";
        exit;
    }
} else {
    echo "Error: Required fields are missing.";
    exit;
}

header("Location: transaksi.php");
?>
