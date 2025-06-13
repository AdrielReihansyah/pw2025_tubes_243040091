<?php require_once 'includes/header.php'; ?>

<section id="home" class="hero-revamped">
    <div class="container hero-container">
        <div class="hero-content">
            <h1 class="hero-title">Solusi Kesehatan Terdepan untuk Anda dan Keluarga</h1>
            <p class="hero-subtitle">Kami menggabungkan keahlian medis dengan teknologi modern untuk memberikan perawatan terbaik. Jadwalkan konsultasi Anda hari ini.</p>
            <div class="hero-buttons">
                <a href="buat-janji.php" class="btn btn-primary btn-lg">Buat Janji Temu</a>
                <a href="#layanan" class="btn btn-secondary btn-lg">Lihat Layanan</a>
            </div>
        </div>
        <div class="hero-image-container">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=2070&auto=format&fit=crop" alt="Dokter Profesional di Klinik" class="hero-image">
        </div>
    </div>
</section>

<section id="layanan" class="services-section">
    <div class="container">
        <div class="section-header">
            <span>Layanan Kami</span>
            <h2>Pelayanan Kesehatan Komprehensif</h2>
            <p>Dari pemeriksaan rutin hingga penanganan spesialis, kami siap melayani Anda.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h12A2.25 2.25 0 0 0 20.25 14.25V3m-15.75 0h15.75M3.75 3v1.5m15.75-1.5v1.5m-15.75 6.75h15.75m-15.75 3h15.75M3.75 12h15.75m-15.75 0a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 3.75 4.5h1.5a2.25 2.25 0 0 1 2.25 2.25v1.5A2.25 2.25 0 0 1 3.75 12Zm15-7.5a2.25 2.25 0 0 1-2.25-2.25V4.5A2.25 2.25 0 0 1 18.75 2.25h1.5a2.25 2.25 0 0 1 2.25 2.25v1.5a2.25 2.25 0 0 1-2.25 2.25h-1.5Zm-6 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                </div>
                <h3>Poli Umum</h3>
                <p>Konsultasi dan penanganan medis untuk segala usia oleh dokter umum terpercaya.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
                <h3>Kesehatan Gigi</h3>
                <p>Perawatan gigi dan mulut, mulai dari pembersihan hingga tindakan bedah minor.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m0 9V18A2.25 2.25 0 0 1 18 20.25h-1.5m-9 0H6A2.25 2.25 0 0 1 3.75 18v-1.5M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <h3>Laboratorium</h3>
                <p>Pemeriksaan darah, urin, dan sampel lainnya dengan hasil yang cepat dan akurat.</p>
            </div>
        </div>
    </div>
</section>

<section id="cari-dokter" class="search-doctor-revamped">
    <div class="container">
        <div class="search-box-glass">
            <h2>Temukan Dokter Spesialis Anda</h2>
            <p>Mencari dokter yang tepat kini lebih mudah. Cukup ketik nama atau spesialisasi.</p>
            <form action="search.php" method="GET" class="search-form-revamped">
                <input type="text" name="query" class="search-input-revamped" placeholder="Contoh: Dr. Budi atau Dokter Anak" required>
                <button type="submit" class="btn btn-primary">Cari Sekarang</button>
            </form>
        </div>
    </div>
</section>

<section id="dokter" class="doctors-section">
    <div class="container">
        <div class="section-header">
            <span>Tim Ahli Kami</span>
            <h2>Berkenalan dengan Dokter Kami</h2>
            <p>Para profesional yang berdedikasi untuk memberikan perawatan terbaik bagi Anda.</p>
        </div>
        <div class="doctor-grid">
            <?php
            require 'includes/db.php';
            try {
                // Ambil data dokter dari database
                $stmt = $pdo->query("SELECT id, nama_dokter, spesialisasi, foto FROM dokter LIMIT 3");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="doctor-card-revamped">';
                    echo '  <div class="doctor-image-wrapper">';
                    // Ganti dengan path gambar Anda, atau gunakan placeholder
                    echo '      <img src="img/' . htmlspecialchars($row['foto']) . '" alt="Foto ' . htmlspecialchars($row['nama_dokter']) . '">';
                    echo '  </div>';
                    echo '  <div class="doctor-info">';
                    echo '      <h3>' . htmlspecialchars($row['nama_dokter']) . '</h3>';
                    echo '      <p>' . htmlspecialchars($row['spesialisasi']) . '</p>';
                    echo '  </div>';
                    echo '  <a href="buat-janji.php?id_dokter=' . $row['id'] . '" class="doctor-link">Buat Janji</a>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo '<p>Gagal memuat data dokter.</p>';
            }
            ?>
        </div>
    </div>
</section>

<section id="testimoni" class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <span>Suara Pasien</span>
            <h2>Pengalaman Mereka Adalah Jaminan Kami</h2>
        </div>
        <div class="testimonial-grid-final">
            <div class="testimonial-card">
                <div class="quote-bg">“</div>
                <div class="card-content">
                    <div class="stars">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                    </div>
                    <p class="quote-text">"Pelayanannya luar biasa cepat dan dokternya sangat ramah. Saya merasa sangat nyaman selama perawatan di sini. Sangat direkomendasikan!"</p>
                    <div class="author-info">
                        <img src="https://i.pravatar.cc/80?u=pasien1" alt="Foto Pasien Rina Wati">
                        <div class="author-details">
                            <h4>Rina Wati</h4>
                            <span>Pasien Poli Umum</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-bg">“</div>
                <div class="card-content">
                    <div class="stars">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                    </div>
                    <p class="quote-text">"Fasilitasnya bersih dan modern. Proses pendaftaran hingga konsultasi berjalan lancar tanpa antrian panjang. Terima kasih Klinik Sehat!"</p>
                    <div class="author-info">
                        <img src="https://i.pravatar.cc/80?u=pasien2" alt="Foto Pasien Agus Setiawan">
                        <div class="author-details">
                            <h4>Agus Setiawan</h4>
                            <span>Pasien Poli Gigi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="kontak" class="contact-section">
    <div class="container">
        <div class="section-header">
            <span>Hubungi Kami</span>
            <h2>Punya Pertanyaan atau Ingin Buat Janji?</h2>
            <p>Tim kami siap membantu Anda. Silakan isi formulir di bawah ini atau hubungi kami melalui detail kontak yang tersedia.</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <p>Jangan ragu untuk mengunjungi atau menghubungi kami selama jam kerja.</p>

                <div class="info-item">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="info-text">
                        <h4>Alamat</h4>
                        <p>Jalan Cidaun No. 74b, Kota Bandung, 10422</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <div class="info-text">
                        <h4>Email</h4>
                        <p>infokliniksehat@gmail.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 6.75Z" />
                        </svg>
                    </div>
                    <div class="info-text">
                        <h4>Telepon</h4>
                        <p>0896-3650-8488</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3>Kirim Pesan Langsung</h3>

                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'sukses') {
                        echo '<p style="color: green; background-color: #e0f8e0; padding: 15px; border-radius: 5px; border: 1px solid green;">Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.</p>';
                    } else {
                        echo '<p style="color: red; background-color: #f8e0e0; padding: 15px; border-radius: 5px; border: 1px solid red;">Maaf, terjadi kesalahan. Silakan coba lagi.</p>';
                    }
                }
                ?>

                <form action="kirim-pesan.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subjek">Subjek</label>
                        <input type="text" id="subjek" name="subjek" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="6" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-widget">
                <h4>Klinik Sehat</h4>
                <p>Memberikan pelayanan kesehatan terbaik dengan hati, didukung oleh teknologi medis modern dan tim profesional yang berdedikasi.</p>
            </div>
            <div class="footer-widget">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#dokter">Dokter</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-widget">
                <h4>Layanan Utama</h4>
                <ul>
                    <li><a href="#">Poli Umum</a></li>
                    <li><a href="#">Kesehatan Gigi</a></li>
                    <li><a href="#">Laboratorium</a></li>
                    <li><a href="#">Kesehatan Anak</a></li>
                </ul>
            </div>
            <div class="footer-widget">
                <h4>Ikuti Kami</h4>
                <p>Dapatkan info kesehatan terbaru dari kami.</p>
                <div class="social-links">
                    <a href="#" title="Facebook">FB</a>
                    <a href="#" title="Instagram">IG</a>
                    <a href="#" title="Twitter">TW</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Klinik Sehat Sejahtera. Dibuat dengan Cinta Oleh Adriel.</p>
        </div>
    </div>
</footer>

</body>

</html>