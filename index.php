<?php


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik elro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <div class="navbar-container">
        <a href="index.html" class="navbar-logo">
            Klinik Elro
        </a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#beranda" class="nav-link" onclick="activateNavLink(event, '#beranda')">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="#layanan" class="nav-link" onclick="activateNavLink(event, '#layanan')">Layanan</a>
            </li>
            <li class="nav-item">
                <a href="#dokter" class="nav-link" onclick="activateNavLink(event, '#dokter')">Dokter Kami</a>
            </li>
            <li class="nav-item">
                <a href="#artikel" class="nav-link" onclick="activateNavLink(event, '#artikel')">Artikel</a>
            </li>
            <li class="nav-item">
                <a href="#kontak" class="nav-link" onclick="activateNavLink(event, '#kontak')">Kontak</a>
            </li>
            <li class="nav-item nav-item-special">
                <a href="#appointment" class="nav-link-button" onclick="activateNavLink(event, '#appointment')">Buat Janji</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>

<script>
    function activateNavLink(event, targetId) {
        event.preventDefault();
        const targetElement = document.querySelector(targetId);
        const navLinks = document.querySelectorAll('.nav-link, .nav-link-button');

        navLinks.forEach(link => link.classList.remove('active'));
        event.target.classList.add('active');

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }
    }
</script>

<script>
    function smoothScroll(event, targetId) {
        event.preventDefault();
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }
    }
</script>

<header id="beranda" class="hero-section">
    <div class="hero-overlay"></div> <div class="hero-container">
        <h1 class="hero-headline animate-on-load animate-fade-in-up">
            Selamat Datang di <span class="highlight-blue">Klinik Elro</span>
        </h1>
        <p class="hero-subheadline animate-on-load animate-fade-in-up" style="animation-delay: 0.3s;">
            Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik dengan sentuhan personal dan teknologi terkini untuk Anda dan keluarga.
        </p>
        <div class="hero-cta-buttons animate-on-load animate-fade-in-up" style="animation-delay: 0.6s;">
            <a href="#appointment" class="btn btn-primary">Buat Janji Temu</a>
            <a href="#layanan" class="btn btn-secondary">Lihat Layanan Kami</a>
        </div>
    </div>
</header>
<?php
$services = [
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-placeholder"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>',
        "title" => "Pemeriksaan Umum",
        "description" => "Konsultasi dan pemeriksaan kesehatan menyeluruh oleh dokter umum berpengalaman kami.",
        "link" => "#detail-pemeriksaan-umum"
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-placeholder"><path d="M20.6 10c.3-1.9-1.2-3.8-3.1-4.1-1.9-.3-3.8 1.2-4.1 3.1.3 1.4.1 2.4-.5 3.9-.6 1.4-1.6 2.8-3 3.9-1.3 1-2.9 1.4-4.4 1.2-.1 0-.2.1-.2.2l-1.3 1.3c-.2.2-.2.5 0 .7l2.2 2.2c.2.2.5.2.7 0l1.3-1.3c0-.1.1-.1.2-.2.3.1.5.1.8.1 2.2 0 4.1-1.2 5.3-3.1.6-1 1.1-2.1 1.2-3.3.1-.2.2-.4.4-.5z"></path><path d="M15 3c-3.2 0-5.8 2.6-5.8 5.8 0 1.2.4 2.4.9 3.3"></path><path d="M10 21c-3.2 0-5.8-2.6-5.8-5.8 0-1.2.4-2.4.9-3.3"></path></svg>',
        "title" => "Klinik Gigi",
        "description" => "Perawatan gigi lengkap, mulai dari pembersihan karang gigi hingga bedah mulut minor.",
        "link" => "#detail-klinik-gigi"
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-placeholder"><path d="M12 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm0 0c0 1.657-1.343 3-3 3S6 6.657 6 5s1.343-3 3-3 3 1.343 3 3ZM9 9a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4v-3a4 4 0 0 0-4-4H9Zm12 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm0 0c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3Z"></path></svg>',
        "title" => "Kesehatan Ibu & Anak",
        "description" => "Layanan komprehensif untuk ibu hamil, persalinan, dan tumbuh kembang anak.",
        "link" => "#detail-kia"
    ],
];
?>

<section id="layanan" class="services-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll">Layanan Unggulan Kami</h2>
        <p class="section-subtitle animate-on-scroll">Kami menyediakan berbagai layanan kesehatan komprehensif untuk memenuhi kebutuhan Anda.</p>
        <div class="services-grid">
            <?php foreach ($services as $service): ?>
                <div class="service-card animate-on-scroll">
                    <div class="service-icon">
                        <?= $service["icon"] ?>
                    </div>
                    <h3 class="service-title"><?= $service["title"] ?></h3>
                    <p class="service-description"><?= $service["description"] ?></p>
                    <a href="<?= $service["link"] ?>" class="service-link">Pelajari Lebih Lanjut &rarr;</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script src="script.js"></script> 
</body>
</html>