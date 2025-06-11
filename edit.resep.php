<?php
include 'koneksi.php';

if (isset($_GET['id_resep'])) {
    $id = $_GET['id_resep'];

    $sql = "DELETE FROM resep WHERE id_resep = :id_resep";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_resep', $id);

    if ($stmt->execute()) {
        // Redirect ke halaman daftar resep
        header("Location: index.awal.php?status=sukses");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID resep tidak ditemukan.";
}
