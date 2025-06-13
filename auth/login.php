<?php
session_start();
require_once '../includes/db.php';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = 'Email dan password wajib diisi!';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama_lengkap'];
            $_SESSION['role'] = $user['role'];
            header("Location: ../index.php");
            exit();
        } else {
            $error_message = 'Email atau password salah!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Klinik Sehat</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-panel auth-form-side">
            <div class="form-wrapper">
                <a href="./index.php" class="auth-logo">Klinik Sehat</a>
                <h3>Selamat Datang Kembali</h3>
                <p>Belum punya akun? <a href="register.php">Daftar gratis</a></p>
                
                <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses_register'): ?>
                    <div class="auth-alert success">Registrasi berhasil! Silakan login.</div>
                <?php endif; ?>
                <?php if (!empty($error_message)): ?>
                    <div class="auth-alert error"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Login</button>
                </form>
            </div>
        </div>
        <div class="auth-panel auth-image-side" style="background-image: linear-gradient(to top, rgba(0, 123, 255, 0.6), rgba(0, 123, 255, 0.2)), url('https://images.unsplash.com/photo-1551601651-2a8555f1a13e?q=80&w=1887&auto=format&fit=crop');">
            <h2>Kesehatan Anda, Prioritas Kami</h2>
            <p>Login untuk mengakses riwayat dan janji temu Anda dengan mudah dan cepat.</p>
        </div>
    </div>
</body>
</html>