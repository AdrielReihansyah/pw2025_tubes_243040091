<?php
session_start();
require_once 'includes/db.php';

// Keamanan: hanya bisa diakses jika ada data yang dikirim via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

// Ambil semua data dari form
$id_pasien = $_POST['id_pasien'];
$id_dokter = $_POST['id_dokter'];
$tanggal_janji = $_POST['tanggal_janji'];
$jam_janji = $_POST['jam_janji'];
$keluhan = trim($_POST['keluhan']);

// Keamanan: Pastikan user yang login adalah user yang membuat janji
if ($id_pasien != $_SESSION['user_id']) {
    // Jika tidak cocok, kirim status gagal
    header("Location: status-janji.php?status=gagal");
    exit();
}

// Validasi sederhana
if (empty($id_pasien) || empty($id_dokter) || empty($tanggal_janji) || empty($jam_janji) || empty($keluhan)) {
    header("Location: status-janji.php?status=gagal");
    exit();
}

// Simpan ke database
try {
    $sql = "INSERT INTO janji_temu (id_pasien, id_dokter, tanggal_janji, jam_janji, keluhan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_pasien, $id_dokter, $tanggal_janji, $jam_janji, $keluhan]);
    
    // Jika sukses, arahkan ke halaman status sukses
    header("Location: status-janji.php?status=sukses");
    exit();
} catch (PDOException $e) {
    // Jika gagal, arahkan ke halaman status gagal
    // die("Error: " . $e->getMessage()); // Untuk debugging
    header("Location: status-janji.php?status=gagal");
    exit();
}
?>