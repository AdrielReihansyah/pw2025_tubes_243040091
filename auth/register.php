<?php
require_once '../includes/db.php';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($nama) || empty($email) || empty($password)) {
        $error_message = 'Semua kolom wajib diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Format email tidak valid!';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error_message = 'Email sudah terdaftar. Silakan gunakan email lain.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (nama_lengkap, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$nama, $email, $hashedPassword])) {
                header("Location: login.php?status=sukses_register");
                exit();
            } else {
                $error_message = 'Registrasi gagal. Silakan coba lagi nanti.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Klinik Sehat</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-panel auth-image-side" style="background-image: linear-gradient(to top, rgba(0, 123, 255, 0.6), rgba(0, 123, 255, 0.2)), url('https://images.unsplash.com/photo-1581056771107-24a7572408f8?q=80&w=1887&auto=format&fit=crop');">
            <h2>Bergabunglah dengan Kami</h2>
            <p>Dapatkan akses mudah untuk membuat janji temu dan mengelola kesehatan Anda.</p>
        </div>
        <div class="auth-panel auth-form-side">
            <div class="form-wrapper">
                <a href="../index.php" class="auth-logo">Klinik Sehat</a>
                <h3>Buat Akun Baru</h3>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                
                <?php if (!empty($error_message)): ?>
                    <div class="auth-alert error"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <form action="register.php" method="POST">
                    <div class="form-group">
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder=" " required>
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Daftar Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>