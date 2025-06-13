<?php
// Mulai session dan panggil file koneksi database
session_start();
require_once 'includes/db.php';

// Cek apakah form sudah disubmit dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Ambil data dari form dan bersihkan
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $subjek = trim($_POST['subjek']);
    $pesan = trim($_POST['pesan']);

    if (empty($nama) || empty($email) || empty($subjek) || empty($pesan)) {
        // Jika ada yang kosong, kembalikan ke halaman kontak dengan status error
        header("Location: index.php?status=gagal#kontak");
        exit();
    }

    // Jika semua data terisi, siapkan query untuk menyimpan ke database
    try {
        $sql = "INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        // Eksekusi query dengan data yang sudah diambil
        // Ini adalah cara aman untuk menghindari SQL Injection
        $stmt->execute([$nama, $email, $subjek, $pesan]);

        // Jika berhasil, kembalikan ke halaman kontak dengan status sukses
        header("Location: index.php?status=sukses#kontak");
        exit();

    } catch (PDOException $e) {
        // Jika terjadi error pada database, kembalikan dengan status gagal
        // die("Error: " . $e->getMessage()); // Baris ini bisa diaktifkan untuk debugging
        header("Location: index.php?status=gagal#kontak");
        exit();
    }

} else {
    // Jika file ini diakses langsung tanpa submit form, tendang kembali ke halaman utama
    header("Location: index.php");
    exit();
}
?>