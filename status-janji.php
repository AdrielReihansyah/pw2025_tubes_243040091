<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Janji Temu - Klinik Sehat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="page-background">
    <div class="status-page-container">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'sukses'):
        ?>
            <div class="status-icon success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
            </div>
            <h1>Janji Temu Berhasil Dibuat!</h1>
            <p>Terima kasih. Janji temu Anda sedang menunggu konfirmasi dari pihak administrasi kami. Anda akan dihubungi lebih lanjut.</p>
            <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
        <?php else: ?>
            <div class="status-icon error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
            </div>
            <h1>Oops! Terjadi Kesalahan</h1>
            <p>Maaf, kami tidak dapat memproses permintaan janji temu Anda saat ini. Silakan coba lagi atau hubungi kami langsung.</p>
            <a href="buat-janji.php" class="btn btn-secondary">Coba Buat Janji Lagi</a>
        <?php endif; ?>
    </div>
</body>
</html><?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Janji Temu - Klinik Sehat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="page-background">
    <div class="status-page-container">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'sukses'):
        ?>
            <div class="status-icon success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
            </div>
            <h1>Janji Temu Berhasil Dibuat!</h1>
            <p>Terima kasih. Janji temu Anda sedang menunggu konfirmasi dari pihak administrasi kami. Anda akan dihubungi lebih lanjut.</p>
            <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
        <?php else: ?>
            <div class="status-icon error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
            </div>
            <h1>Oops! Terjadi Kesalahan</h1>
            <p>Maaf, kami tidak dapat memproses permintaan janji temu Anda saat ini. Silakan coba lagi atau hubungi kami langsung.</p>
            <a href="buat-janji.php" class="btn btn-secondary">Coba Buat Janji Lagi</a>
        <?php endif; ?>
    </div>
</body>
</html>