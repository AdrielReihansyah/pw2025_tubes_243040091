<?php require_once 'admin-header.php'; ?>

<div class="content-body">
    <h2>Manajemen User Terdaftar</h2>
    <p>Di sini Anda dapat melihat semua pengguna yang terdaftar di sistem.</p>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                <th>Tanggal Bergabung</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT id, nama_lengkap, email, role, created_at FROM users ORDER BY id DESC");
            while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . htmlspecialchars($user['nama_lengkap']) . "</td>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "<td><span class='role-badge role-" . $user['role'] . "'>" . ucfirst($user['role']) . "</span></td>";
                echo "<td>" . date('d M Y', strtotime($user['created_at'])) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once 'admin-footer.php'; ?>