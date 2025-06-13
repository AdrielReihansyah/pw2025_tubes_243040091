<?php
session_start(); // Mulai sesi untuk mengaksesnya

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Arahkan kembali ke halaman utama
header("location: ../index.php");
exit;
?>