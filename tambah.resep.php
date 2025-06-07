<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (gunakan PDO atau MySQLi)
    $host = 'localhost';
    $dbname = 'db_lsp';
    $username = 'root';
    
    try {
        // Koneksi ke database
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ambil data dari form
        $nama = $_POST['nama'];
        $alat = $_POST['alat'];
        $bahan = $_POST['bahan'];
        $cara = $_POST['cara'];
        $kategori = $_POST['kategori'];

        // Query untuk menyimpan data film
        $sql = "INSERT INTO resep (nama, alat, bahan, bahan, cara, kategori) 
                VALUES (:nama, :alat, :bahan, :bahan, :cara, :kategori)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alat', $alat);
        $stmt->bindParam(':bahan', $bahan);
        $stmt->bindParam(':bahan', $bahan);
        $stmt->bindParam(':cara', $cara);
        $stmt->bindParam(':kategori', $kategori);

        // Eksekusi query
        $stmt->execute();
        
        //ambil id film yang baru saja ditambahkan
        $resep_id = $pdo->lastInsertId();

        // Redirect ke halaman utama atau tampilkan pesan sukses
        header("Location: index-admin.php?message=Film berhasil ditambahkan");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
