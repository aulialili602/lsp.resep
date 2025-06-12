<?php
    include 'koneksi.php';

    if(isset($_POST['simpan_edit'])) {
        $id_resep = $_POST['id_resep'];
        $nama = $_POST['nama'];
        $alat = $_POST['alat'];
        $bahan = $_POST['bahan'];
        $cara = $_POST['cara'];
        $id_kategori = $_POST['kategori'];


    $stmt = $conn->prepare("UPDATE resep SET nama = ?, alat = ?, bahan = ?, cara = ?, id_kategori = ? WHERE id_resep = ?");
    $stmt->execute([$nama, $alat, $bahan, $cara, $id_kategori, $id_resep]);

    // Setelah update berhasil, redirect ke halaman utama
header("Location: index.awal.php");
exit;
    }

?>