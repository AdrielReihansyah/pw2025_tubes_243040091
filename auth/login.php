<?php
require_once '../includes/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = 'Email dan password wajib diisi!';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login sukses, buat session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama_lengkap'];
            $_SESSION['role'] = $user['role'];
            header("Location: /klinik-website/index.php");
            exit();
        } else {
            $message = 'Email atau password salah!';
        }
    }
}
?>

<?php require_once '../includes/header.php'; ?>

<div class="form-container">
    <h2>Login</h2>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses_register'): ?>
        <p style="color: green; text-align: center;">Registrasi berhasil! Silakan login.</p>
    <?php endif; ?>
    <?php if ($message): ?>
        <p style="color: red; text-align: center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
    </form>
     <p style="text-align: center; margin-top: 15px;">
        Belum punya akun? <a href="register.php">Daftar di sini</a>
    </p>
</div>

<?php require_once '../includes/footer.php'; ?>