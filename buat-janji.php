<?php
// Di file ini, kita butuh session untuk tahu siapa yang login
session_start();
require_once 'includes/db.php';

// KEAMANAN: Cek apakah pengguna sudah login. Jika belum, tendang ke halaman login.
if (!isset($_SESSION['user_id'])) {
    // Simpan pesan untuk ditampilkan di halaman login
    $_SESSION['login_error'] = "Anda harus login terlebih dahulu untuk membuat janji temu.";
    header("Location: auth/login.php");
    exit();
}

// Cek apakah pengguna sudah memilih dokter (dari URL ?pilih_dokter=...)
$dokter_dipilih_id = isset($_GET['pilih_dokter']) ? (int)$_GET['pilih_dokter'] : null;
$dokter_dipilih_data = null;

if ($dokter_dipilih_id) {
    // Jika dokter sudah dipilih, ambil datanya untuk ditampilkan di form
    $stmt = $pdo->prepare("SELECT * FROM dokter WHERE id = ?");
    $stmt->execute([$dokter_dipilih_id]);
    $dokter_dipilih_data = $stmt->fetch(PDO::FETCH_ASSOC);
    // Jika ID dokter tidak valid, reset
    if (!$dokter_dipilih_data) {
        $dokter_dipilih_id = null;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Janji Temu - Klinik Sehat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="page-background">

    <div class="appointment-page">
        <a href="index.php" class="back-to-home-btn">← Kembali ke Beranda</a>
        
        <?php if (!$dokter_dipilih_id): ?>
            <div class="selection-container">
                <h1>Langkah 1: Pilih Dokter Anda</h1>
                <p>Pilih salah satu dokter spesialis kami yang paling sesuai dengan kebutuhan Anda.</p>
                <div class="doctor-selection-grid">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM dokter ORDER BY nama_dokter");
                    while ($dokter = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="doctor-select-card">';
                        echo '  <img src="img/' . htmlspecialchars($dokter['foto']) . '" alt="' . htmlspecialchars($dokter['nama_dokter']) . '">';
                        echo '  <div class="doctor-select-info">';
                        echo '      <h3>' . htmlspecialchars($dokter['nama_dokter']) . '</h3>';
                        echo '      <p>' . htmlspecialchars($dokter['spesialisasi']) . '</p>';
                        echo '      <a href="buat-janji.php?pilih_dokter=' . $dokter['id'] . '" class="btn btn-primary">Pilih Dokter Ini</a>';
                        echo '  </div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

        <?php else: ?>
            <div class="form-container-appointment">
                <div class="selected-doctor-info">
                    <img src="img/<?php echo htmlspecialchars($dokter_dipilih_data['foto']); ?>" alt="<?php echo htmlspecialchars($dokter_dipilih_data['nama_dokter']); ?>">
                    <div>
                        <p>Anda akan membuat janji dengan:</p>
                        <h3><?php echo htmlspecialchars($dokter_dipilih_data['nama_dokter']); ?></h3>
                        <span><?php echo htmlspecialchars($dokter_dipilih_data['spesialisasi']); ?></span>
                    </div>
                </div>

                <hr>
            
                <h2>Langkah 2: Isi Detail Janji Temu</h2>
                <form action="proses-janji.php" method="POST">
                    <input type="hidden" name="id_dokter" value="<?php echo $dokter_dipilih_data['id']; ?>">
                    <input type="hidden" name="id_pasien" value="<?php echo $_SESSION['user_id']; ?>">

                    <div class="form-group">
                        <input type="date" id="tanggal_janji" name="tanggal_janji" class="form-control" placeholder=" " required>
                        <label for="tanggal_janji">Pilih Tanggal</label>
                    </div>

                    <div class="form-group">
                        <input type="time" id="jam_janji" name="jam_janji" class="form-control" placeholder=" " required>
                        <label for="jam_janji">Pilih Jam</label>
                    </div>

                    <div class="form-group">
                        <textarea id="keluhan" name="keluhan" rows="4" class="form-control" placeholder=" " required></textarea>
                        <label for="keluhan">Tuliskan Keluhan Utama Anda</label>
                    </div>

                    <div class="form-actions">
                        <a href="buat-janji.php" class="btn btn-secondary">← Ganti Dokter</a>
                        <button type="submit" class="btn btn-primary">Konfirmasi Janji Temu</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>