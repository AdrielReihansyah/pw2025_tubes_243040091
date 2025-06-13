<?php
// Memanggil file config untuk mendapatkan BASE_URL
require_once __DIR__ . '/../config.php';

session_start();
// Proteksi Halaman Admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: " . BASE_URL . "auth/login.php");
    exit();
}
// Memanggil DB
require_once __DIR__ . '/../includes/db.php';

// Menentukan halaman aktif untuk styling sidebar
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Klinik Sehat</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <a href="<?php echo BASE_URL; ?>admin/index.php" title="Kembali ke Dashboard">Admin Klinik</a>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/index.php">Pesan Masuk</a>
                    </li>
                    <li class="<?php echo ($current_page == 'manajemen-user.php') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/manajemen-user.php">Manajemen User</a>
                    </li>
                    <li class="<?php echo ($current_page == 'manajemen-janji.php') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/manajemen-janji.php">Manajemen Janji</a>
                    </li>
                    <li><a href="<?php echo BASE_URL; ?>auth/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main class="admin-content">
            <header class="content-header">
                <h1><?php echo htmlspecialchars($_SESSION['nama']); ?></h1>
                <p>Anda login sebagai Admin.</p>
            </header>