<?php
echo "<h1>Tes Diagnostik Path</h1>";
echo "<hr>";

echo "<h2>Lokasi File Tes Saat Ini (__DIR__):</h2>";
echo "<p>" . __DIR__ . "</p>";
echo "<hr>";

echo "<h2>Mencari 'config.php'...</h2>";
$config_path = __DIR__ . '/../config.php';
echo "<p>PHP mencari file config di path server: <strong>" . $config_path . "</strong></p>";

if (file_exists($config_path)) {
    echo "<h3 style='color:green;'>BERHASIL: File 'config.php' ditemukan!</h3>";
    
    // Sekarang kita coba muat filenya
    require_once $config_path;
    
    echo "<h2>Mengecek Konstanta 'BASE_URL'...</h2>";
    if (defined('BASE_URL')) {
        echo "<p>Nilai BASE_URL adalah: <strong style='color:blue;'>" . BASE_URL . "</strong></p>";
        echo "<h3 style='color:green;'>DIAGNOSA: Konfigurasi Path terlihat BENAR.</h3>";
    } else {
        echo "<h3 style='color:red;'>ERROR: 'config.php' ditemukan, tapi konstanta BASE_URL tidak terdefinisi! Cek isi file config.php Anda.</h3>";
    }

} else {
    echo "<h3 style='color:red;'>ERROR: File 'config.php' TIDAK DITEMUKAN di lokasi tersebut!</h3>";
    echo "<p>Pastikan file 'config.php' ada di folder utama proyek Anda, satu level di atas folder 'admin'.</p>";
}
?>