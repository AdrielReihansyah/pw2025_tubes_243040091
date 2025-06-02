<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat Sentosa - Pelayanan Kesehatan Terpercaya</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header class="navbar">
        <div class="container nav-container">
            <a href="#hero" class="navbar-brand">
                <img src="../img/logo.png" alt="Logo Klinik Sehat Sentosa" class="logo">
                klinik Sehat Sentosa
            </a>

            <input type="checkbox" id="navbar-toggle-cb" class="navbar-toggle-checkbox">
            <label for="navbar-toggle-cb" class="navbar-toggler-label">
                <i class="fas fa-bars"></i>
            </label>

            <nav class="navbar-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="#hero" class="nav-link active">Beranda</a></li>
                    <li class="nav-item"><a href="#tentang" class="nav-link">Tentang Kami</a></li>
                    <li class="nav-item"><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li class="nav-item"><a href="#dokter" class="nav-link">Tim Dokter</a></li>
                    <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
                </ul>
                <div class="action navbar-actions-mobile">
                    <a href="#buat-janji" class="btn btn-primary btn-nav-action-mobile">Buat Janji</a>
                    <a href="#register" class="btn btn-outline-primary btn-nav-action-mobile">Register</a>
                    </div>
            </nav>
    </header>

    <section id="hero" class="hero-section">
        <div class="hero-overlay"></div> <div class="container hero-content">
            <h1 class="hero-title">Perawatan Kesehatan Holistik untuk Kesejahteraan Anda</h1>
            <p class="hero-subtitle">
                Klinik Sehat Sentosa hadir dengan fasilitas modern dan tim medis profesional yang siap melayani Anda dengan sepenuh hati.
            </p>
            <a href="#layanan" class="btn btn-light btn-hero">Lihat Layanan Kami</a>
            <a href="#buat-janji" class="btn btn-outline-light btn-hero">Buat Janji Temu <i class="fas fa-calendar-alt"></i></a>
        </div>
    </section>

    <section id="buat-janji" class="buat-janji-section section-padding">
        <div class="container">
            <h2 class="section-title">Buat Janji Mudah & Cepat</h2>
            <p class="section-intro">Silakan hubungi kami melalui telepon atau kunjungi klinik langsung untuk membuat janji temu.</p>
            <div class="kontak-info-item">
                <i class="fas fa-phone-alt icon-accent"></i>
                <span>0896 - 3650 - 8488</span>
            </div>
            <p class="section-intro" style="margin-top:10px;">Atau klik tombol di bawah untuk informasi lebih lanjut mengenai jadwal dokter.</p>
            <a href="#dokter" class="btn btn-primary" style="margin-top:20px;">Lihat Jadwal Dokter</a>
        </div>
    </section>

    <section id="tentang" class="tentang-section section-padding bg-light-blue">
        <div class="container">
            <h2 class="section-title">Tentang Klinik Sehat Sentosa</h2>
            <div class="tentang-content">
                <div class="tentang-teks">
                    <p>Klinik Sehat Sentosa didirikan dengan misi untuk menyediakan akses pelayanan kesehatan berkualitas yang terjangkau bagi masyarakat. Kami percaya bahwa kesehatan adalah aset berharga, dan kami berdedikasi untuk membantu Anda mencapainya.</p>
                    <p>Dengan dukungan teknologi medis terkini dan suasana klinik yang nyaman, kami berupaya memberikan pengalaman terbaik bagi setiap pasien.</p>
                    <ul>
                        <li><i class="fas fa-check-circle icon-accent"></i> Dokter Spesialis Berpengalaman</li>
                        <li><i class="fas fa-check-circle icon-accent"></i> Fasilitas Lengkap & Modern</li>
                        <li><i class="fas fa-check-circle icon-accent"></i> Pelayanan Ramah & Profesional</li>
                    </ul>
                </div>
                <div class="tentang-gambar">
                    <img src="../img/tentang.png" alt="Interior Klinik Sehat Sentosa">
                    </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="layanan-section section-padding">
        <div class="container">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <p class="section-intro">Kami menyediakan berbagai layanan kesehatan untuk memenuhi kebutuhan Anda.</p>
            <div class="layanan-grid">
                <div class="layanan-card">
                    <div class="layanan-icon"><i class="fas fa-stethoscope fa-3x"></i></div>
                    <h3>Poli Umum</h3>
                    <p>Pemeriksaan kesehatan umum, konsultasi, dan tindakan medis dasar.</p>
                </div>
                <div class="layanan-card">
                    <div class="layanan-icon"><i class="fas fa-tooth fa-3x"></i></div>
                    <h3>Poli Gigi</h3>
                    <p>Perawatan gigi dan mulut, mulai dari pembersihan hingga tindakan kompleks.</p>
                </div>
                <div class="layanan-card">
                    <div class="layanan-icon"><i class="fas fa-baby fa-3x"></i></div>
                    <h3>Kesehatan Ibu & Anak</h3>
                    <p>Layanan komprehensif untuk ibu hamil, persalinan, dan kesehatan anak.</p>
                </div>
                <div class="layanan-card">
                    <div class="layanan-icon"><i class="fas fa-flask fa-3x"></i></div>
                    <h3>Laboratorium</h3>
                    <p>Pemeriksaan laboratorium lengkap untuk diagnosis yang akurat.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="dokter" class="dokter-section section-padding bg-light-blue">
        <div class="container">
            <h2 class="section-title">Tim Dokter Profesional Kami</h2>
            <p class="section-intro">Bertemu dengan para dokter kami yang berdedikasi dan berpengalaman.</p>
            <div class="dokter-grid">
                <div class="dokter-card">
                    <img src="../img/dokter1.jpeg" alt="Dr. Budi Santoso" class="dokter-foto">
                    <h3>Dr. Budi Santoso, Sp.PD</h3>
                    <p class="dokter-spesialisasi">Spesialis Penyakit Dalam</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                </div>
                <div class="dokter-card">
                    <img src="../img/dokter3.jpeg" alt="Dr. Citra Amelia" class="dokter-foto">
                    <h3>Dr. Citra Amelia, Sp.A</h3>
                    <p class="dokter-spesialisasi">Spesialis Anak</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                </div>
                <div class="dokter-card">
                    <img src="../img/dokter2.jpeg" alt="Dr. Rina Wijaya" class="dokter-foto">
                    <h3>Drg. Rina Wijaya</h3>
                    <p class="dokter-spesialisasi">Dokter Gigi</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="kontak-section section-padding">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-intro">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.</p>
            <div class="kontak-grid">
                <div class="kontak-info">
                    <h4>Klinik Sehat Sentosa</h4>
                    <div class="kontak-info-item">
                        <i class="fas fa-map-marker-alt icon-accent"></i>
                        <span>Jl. Dr. Setiabudi No.193, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153</span>
                    </div>
                    <div class="kontak-info-item">
                        <i class="fas fa-phone-alt icon-accent"></i>
                        <span>0896 - 3650 - 8488</span>
                    </div>
                    <div class="kontak-info-item">
                        <i class="fas fa-envelope icon-accent"></i>
                        <span>kliniksehatsentosa@gmail.com</span>
                    </div>
                    <div class="kontak-info-item">
                        <i class="fas fa-clock icon-accent"></i>
                        <span>Senin - Sabtu: 08:00 - 20:00 WIB</span>
                    </div>
                </div>
                <div class="kontak-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.203629928329!2d107.58995267483141!3d-6.866184967178263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ad402365e9%3A0x720f2e1a52359642!2sFakultas%20Teknik%20Unpas!5e0!3m2!1sen!2sid!4v1748901676622!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-container">
            <p>&copy; <span id="tahun"></span> Klinik Sehat Sentosa. Semua Hak Dilindungi.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/share/1F7SfxFXBz/" aria-label="Facebook Klinik"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/adriellrhnsyah/" aria-label="Instagram Klinik"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/driellbarunih?t=2KOXN9-z5FuAWMj4lNs90g&s=09" aria-label="Twitter Klinik"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

<script>
    document.getElementById('tahun').textContent = new Date().getFullYear();
</script>
</body>
</html>