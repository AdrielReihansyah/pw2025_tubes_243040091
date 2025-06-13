<?php
require_once '../includes/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($password)) {
        $message = 'Semua field wajib diisi!';
    } else {
        // Cek jika email sudah terdaftar
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $message = 'Email sudah terdaftar!';
        } else {
            // Hash password untuk keamanan
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Simpan ke database
            $stmt = $pdo->prepare("INSERT INTO users (nama_lengkap, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$nama, $email, $hashedPassword])) {
                header("Location: login.php?status=sukses_register");
                exit();
            } else {
                $message = 'Registrasi gagal, coba lagi.';
            }
        }
    }
}
?>

<?php require_once '../includes/header.php'; ?>

<div class="form-container">
    <h2>Daftar Akun Baru</h2>
    <?php if ($message): ?>
        <p style="color: red; text-align: center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Daftar</button>
    </form>
    <p style="text-align: center; margin-top: 15px;">
        Sudah punya akun? <a href="login.php">Login di sini</a>
    </p>
</div>

<?php require_once '../includes/footer.php'; ?>