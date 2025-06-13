<?php
require_once '../includes/header.php';

// Proteksi halaman: hanya admin yang bisa akses
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<div class='container' style='text-align:center; padding: 50px;'><h2>Akses Ditolak!</h2><p>Anda harus login sebagai admin untuk mengakses halaman ini.</p></div>";
    require_once '../includes/footer.php';
    exit();
}

require_once '../includes/db.php';
?>

<section id="admin-dashboard">
    <div class="container">
        <h2>Dashboard Admin - Daftar Janji Temu</h2>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 12px; border: 1px solid #ddd;">Pasien</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Dokter</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Tanggal</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Jam</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("
                    SELECT j.*, u.nama_lengkap AS nama_pasien, d.nama_dokter 
                    FROM janji_temu j
                    JOIN users u ON j.id_pasien = u.id
                    JOIN dokter d ON j.id_dokter = d.id
                    ORDER BY j.tanggal_janji, j.jam_janji
                ");

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td style='padding: 12px; border: 1px solid #ddd;'>" . htmlspecialchars($row['nama_pasien']) . "</td>";
                    echo "<td style='padding: 12px; border: 1px solid #ddd;'>" . htmlspecialchars($row['nama_dokter']) . "</td>";
                    echo "<td style='padding: 12px; border: 1px solid #ddd;'>" . htmlspecialchars($row['tanggal_janji']) . "</td>";
                    echo "<td style='padding: 12px; border: 1px solid #ddd;'>" . htmlspecialchars($row['jam_janji']) . "</td>";
                    echo "<td style='padding: 12px; border: 1px solid #ddd;'>" . htmlspecialchars($row['status']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>