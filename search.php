<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/db.php'; ?>

<section class="search-results-page">
    <div class="container">
        <?php
// Ambil query pencarian dari URL dan pastikan aman
$search_query = isset($_GET['query']) ? trim($_GET['query']) : '';
$safe_query = htmlspecialchars($search_query);

if (!empty($search_query)) {
    echo "<h2>Hasil Pencarian untuk: \"{$safe_query}\"</h2>";

    // --- TOMBOL KEMBALI DITAMBAHKAN DI SINI ---
    echo '<a href="index.php" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Kembali ke Beranda
          </a>';
    // --- AKHIR TOMBOL KEMBALI ---

    // Siapkan query untuk mencari di nama_dokter atau spesialisasi
    $sql = "SELECT * FROM dokter WHERE nama_dokter LIKE ? OR spesialisasi LIKE ?";
    $stmt = $pdo->prepare($sql);

    // Eksekusi dengan menambahkan wildcard '%'
    $searchTerm = "%" . $search_query . "%";
    $stmt->execute([$searchTerm, $searchTerm]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        echo '<div class="doctor-grid">';
        foreach ($results as $row) {
            // Kita gunakan desain kartu dokter yang sudah disempurnakan
            echo '<div class="doctor-card-revamped">';
            echo '  <div class="doctor-image-wrapper">';
            echo '      <img src="img/' . htmlspecialchars($row['foto']) . '" alt="Foto ' . htmlspecialchars($row['nama_dokter']) . '">';
            echo '  </div>';
            echo '  <div class="doctor-info">';
            echo '      <h3>' . htmlspecialchars($row['nama_dokter']) . '</h3>';
            echo '      <p>' . htmlspecialchars($row['spesialisasi']) . '</p>';
            echo '  </div>';
            echo '  <a href="buat-janji.php?id_dokter=' . $row['id'] . '" class="doctor-link">Buat Janji</a>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p class='no-results'>Tidak ada dokter yang ditemukan dengan kriteria '{$safe_query}'. Coba kata kunci lain.</p>";
    }
} else {
    echo "<h2>Pencarian Dokter</h2>";
    // Tombol kembali juga bisa ditambahkan di sini jika diperlukan
    echo '<a href="/klinik-website/index.php" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Kembali ke Beranda
          </a>';
    echo "<p class='no-results'>Silakan masukkan nama dokter atau spesialisasi pada kolom pencarian di halaman utama.</p>";
}
?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>