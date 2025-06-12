<?php
include 'koneksi.php';

$id = $_POST['id_resep'];
$id_kategori = $_POST['id_kategori'];

$stmt = $coon->prepare("UPDATE resep SET status = ? WHERE id_resep");
$stmt->execute([$id_kategori, $id_resep]);

header("Location: index.awal.php?id_resep=".$_GET['id_resep']);

?>