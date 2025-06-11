<?php
include 'koneksi.php'; // file koneksi ke database

// Ambil data dari form
$id_resep = $_POST['id_resep']; // pastikan field ini ada saat form edit
$nama = $_POST['nama'];
$alat = $_POST['alat'];
$bahan = $_POST['bahan'];
$cara = $_POST['cara'];
$kategori = $_POST['kategori'];

if  {
    $query = "UPDATE resep SET 
                nama = '$nama', 
                alat = '$alat', 
                bahan = '$bahan', 
                cara = '$cara', 
                kategori_id = '$kategori', 
              WHERE id_resep = '$id_resep'";
}
$result = mysqli_query($conn, $query);


if ($result) {
    echo "<script>alert('Data berhasil diupdate!'); window.location.href='index-admin.php';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data.'); history.back();</script>";
}
?>
