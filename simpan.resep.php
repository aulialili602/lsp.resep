<?php
include 'koneksi.php';

$nama = $_POST['nama'] ;
$alat = $_POST['alat'] ;
$bahan = $_POST['bahan'] ;
$cara = $_POST['cara'] ;
// $kategori = $_POST['kategori'];

try { 
    // Insert ke tabel resep
    $sql = "INSERT INTO resep (nama, alat, bahan, cara)
            VALUES (:nama, :alat, :bahan, :cara)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alat', $alat);
    $stmt->bindParam(':bahan', $bahan);
    $stmt->bindParam(':cara', $cara);
    // $stmt->bindParam(':kategori', $kategori);
    $stmt->execute();

    header("Location: index.awal.php");
    exit();
}catch (PDOException $e) {
    die("error: " . $e->getMessage()); 
}
?>
