<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$alat = $_POST['alat'];
$bahan = $_POST['bahan'];
$cara = $_POST['cara'];
$kategori_nama = $_POST['nama_kategori']; // perhatikan huruf besar

try {
    // Cek apakah kategori sudah ada
    $stmt = $conn->prepare("SELECT id_kategori FROM kategori WHERE nama_kategori = :nama_kategori");
    $stmt->bindParam(':nama_kategori', $kategori_nama);
    $stmt->execute();
    $kategori = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($kategori) {
        $id_kategori = $kategori['id_kategori'];
    } else {
        $stmt = $conn->prepare("INSERT INTO kategori (nama_kategori) VALUES (:nama_kategori)");
        $stmt->bindParam(':nama_kategori', $kategori_nama);
        $stmt->execute();
        $id_kategori = $conn->lastInsertId();
    }

    // Insert ke tabel resep
    $sql = "INSERT INTO resep (nama, alat, bahan, cara, id_kategori)
            VALUES (:nama, :alat, :bahan, :cara, :id_kategori)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alat', $alat);
    $stmt->bindParam(':bahan', $bahan);
    $stmt->bindParam(':cara', $cara);
    $stmt->bindParam(':id_kategori', $id_kategori);
    $stmt->execute();

    header("Location: index-admin.php");
    exit();

} catch (PDOException $e) {
    echo "Gagal: " . $e->getMessage();
}
?>
