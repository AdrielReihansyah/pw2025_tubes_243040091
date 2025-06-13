<?php require_once 'admin-header.php'; ?>

<div class="content-body">
    <h2>Manajemen Janji Temu</h2>
    <p>Di sini Anda dapat melihat dan mengelola semua permintaan janji temu dari pasien.</p>

    <div class="message-list">
        <?php
        // Query JOIN untuk mengambil data dari 3 tabel sekaligus
        $sql = "SELECT 
                    jt.id, jt.tanggal_janji, jt.jam_janji, jt.keluhan, jt.status,
                    pasien.nama_lengkap AS nama_pasien,
                    dokter.nama_dokter
                FROM 
                    janji_temu jt
                JOIN 
                    users pasien ON jt.id_pasien = pasien.id
                JOIN 
                    dokter ON jt.id_dokter = dokter.id
                ORDER BY 
                    jt.status ASC, jt.tanggal_janji DESC";
        
        $stmt = $pdo->query($sql);
        $janji_temu_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($janji_temu_list)) {
            echo "<p>Belum ada data janji temu.</p>";
        } else {
            foreach ($janji_temu_list as $janji) {
                $card_class = $janji['status'] === 'Menunggu' ? 'status-baru' : '';

                echo '<div class="message-card ' . $card_class . '">';
                echo '  <div class="message-header">';
                echo '      <div class="sender-info">';
                echo '          <h4>Pasien: ' . htmlspecialchars($janji['nama_pasien']) . '</h4>';
                echo '          <span>Dokter: ' . htmlspecialchars($janji['nama_dokter']) . '</span>';
                echo '      </div>';
                echo '      <div class="message-meta">';
                echo '          <span class="status">' . htmlspecialchars($janji['status']) . '</span>';
                echo '          <span class="timestamp">Jadwal: ' . date('d M Y', strtotime($janji['tanggal_janji'])) . ' jam ' . date('H:i', strtotime($janji['jam_janji'])) . '</span>';
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="message-body">';
                echo '      <h5>Keluhan:</h5>';
                echo '      <p>' . nl2br(htmlspecialchars($janji['keluhan'])) . '</p>';
                echo '  </div>';
                echo '  <div class="message-actions">';
                echo '      <a href="#" class="btn btn-secondary">Konfirmasi</a>';
                echo '  </div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<?php require_once 'admin-footer.php'; ?>