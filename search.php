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
                    echo '<div class="doctor-card">';
                    // echo '<img src="images/' . htmlspecialchars($row['foto']) . '" alt="Foto ' . htmlspecialchars($row['nama_dokter']) . '">';
                    echo '<h3>' . htmlspecialchars($row['nama_dokter']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['spesialisasi']) . '</p>';
                    // Tambahkan tombol untuk buat janji langsung dengan dokter ini
                    echo '<a href="buat-janji.php?id_dokter=' . $row['id'] . '" class="btn btn-primary" style="margin-top: 15px;">Buat Janji</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo "<p class='no-results'>Tidak ada dokter yang ditemukan dengan kriteria '{$safe_query}'. Coba kata kunci lain.</p>";
            }
        } else {
            echo "<h2>Pencarian Dokter</h2>";
            echo "<p class='no-results'>Silakan masukkan nama dokter atau spesialisasi pada kolom pencarian di halaman utama.</p>";
        }
        ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>