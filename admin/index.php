<?php require_once 'admin-header.php'; ?>

<div class="content-body">
    <h2>Pesan Masuk dari Pengguna</h2>
    <div class="message-list">
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM pesan_kontak ORDER BY status ASC, waktu_kirim DESC");
            $pesan_masuk = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($pesan_masuk)) {
                echo "<p>Tidak ada pesan masuk saat ini.</p>";
            } else {
                foreach ($pesan_masuk as $pesan) {
                    // Tentukan class berdasarkan status
                    $card_class = $pesan['status'] === 'Baru' ? 'status-baru' : '';
                    
                    echo '<div class="message-card ' . $card_class . '">';
                    echo '  <div class="message-header">';
                    echo '      <div class="sender-info">';
                    echo '          <h4>' . htmlspecialchars($pesan['nama']) . '</h4>';
                    echo '          <span>' . htmlspecialchars($pesan['email']) . '</span>';
                    echo '      </div>';
                    echo '      <div class="message-meta">';
                    echo '          <span class="status">' . $pesan['status'] . '</span>';
                    echo '          <span class="timestamp">' . date('d M Y, H:i', strtotime($pesan['waktu_kirim'])) . '</span>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '  <div class="message-body">';
                    echo '      <h5>Subjek: ' . htmlspecialchars($pesan['subjek']) . '</h5>';
                    echo '      <p>' . nl2br(htmlspecialchars(substr($pesan['pesan'], 0, 150))) . '...</p>';
                    echo '  </div>';
                    echo '  <div class="message-actions">';
                    echo '      <a href="lihat-pesan.php?id=' . $pesan['id'] . '" class="btn btn-secondary">Lihat Detail</a>';
                    echo '  </div>';
                    echo '</div>';
                }
            }
        } catch (PDOException $e) {
            echo '<p class="error">Gagal memuat pesan: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>
</div>

<?php require_once 'admin-footer.php'; ?>