<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alat = $_POST['alat'];
    $bahan = $_POST['bahan'];
    $cara = $_POST['cara'];
    $id_kategori = $_POST['kategori'];

    try {
        // Siapkan SQL-nya
        $sql = "INSERT INTO resep (nama, alat, bahan, cara, id_kategori)
                VALUES (?, ?, ?, ?, ?)";

        // Siapkan statement dulu, baru dieksekusi
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nama, $alat, $bahan, $cara, $id_kategori]);

        // Redirect setelah berhasil
        header("Location: index.awal.php");
        exit();

    } catch (PDOException $e) {
        die("error: " . $e->getMessage());
    }
}
?>
