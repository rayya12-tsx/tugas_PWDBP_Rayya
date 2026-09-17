<?php
session_start();
include "config.php";

// ambil data dari form
$nama         = $_POST['nama'];
$kode_pesawat = $_POST['kode_pesawat'];
$kelas        = $_POST['kelas'];
$jumlah       = $_POST['jumlah_tiket'];

// cek dulu kelasnya ada di daftar harga atau nggak
if (array_key_exists($kelas, $harga_kelas)) {
    $harga_satuan = $harga_kelas[$kelas];
    $total        = $harga_satuan * $jumlah;
} else {
    $total = 0;
}

// simpan ke session biar bisa ditampilkan lagi di index.php
$_SESSION['nama']         = $nama;
$_SESSION['kode_pesawat'] = $kode_pesawat;
$_SESSION['kelas']        = $kelas;
$_SESSION['jumlah']       = $jumlah;
$_SESSION['total']        = $total;

// balik lagi ke halaman form
header("Location: index.php");
exit;
?>
