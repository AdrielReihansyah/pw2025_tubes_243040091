<?php
// Memanggil file config untuk mendapatkan BASE_URL
require_once __DIR__ . '/../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat Sejahtera</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="page-home"> 

    <header class="site-header">
        <nav class="navbar">
            <div class="navbar-container">
                <a href="<?php echo BASE_URL; ?>index.php#home" class="nav-logo">Klinik Sehat</a>
                <ul class="nav-menu">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li><a href="#dokter" class="nav-link">Dokter</a></li>
                    <li><a href="#kontak" class="nav-link">Kontak</a></li>
                </ul>
                <div class="nav-auth">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="nav-user-greeting">Halo, <?php echo htmlspecialchars(explode(' ', $_SESSION['nama'])[0]); ?>!</span>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                             <a href="<?php echo BASE_URL; ?>admin/" class="nav-icon-btn" title="Dashboard Admin">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0M3.75 18H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0M3.75 12H15m-11.25 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0" /></svg>
                             </a>
                        <?php endif; ?>
                        <a href="<?php echo BASE_URL; ?>auth/logout.php" class="nav-icon-btn" title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>auth/login.php" class="nav-link login-link">Login</a>
                        <a href="<?php echo BASE_URL; ?>auth/register.php" class="btn btn-primary nav-cta">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main>