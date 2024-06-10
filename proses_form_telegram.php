<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST["nama"];
    $ucapan = $_POST["ucapan"];
    $konfirmasi = $_POST["konfirmasi"];

    // Token bot Telegram
    $botToken = '6125694353:AAExCaUI1xy0-_rX2Qbo5MGWM5hJp3u9M2M';

    // ID obrolan tempat kamu ingin mengirim pesan
    $chatId = '5587950881';

    // Pesan yang akan dikirimkan
    $message = "Nama: $nama\nUcapan: $ucapan\nKonfirmasi Kehadiran: $konfirmasi";

    // URL endpoint untuk mengirim pesan menggunakan bot API
    $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);

    // Kirim pesan ke bot Telegram
    file_get_contents($telegramUrl);

    // Set cookie untuk menampilkan pesan sukses setelah pengguna mengirim formulir
    setcookie('success_message', 'Pesan berhasil dikirim!', time() + 5, '/'); // Cookie berlaku selama 5 detik

    // Kembali ke halaman utama setelah mengirim pesan
    header('Location: index.php');
    exit;
}

// Periksa apakah cookie pesan sukses telah diatur, jika iya, tampilkan pesan
if (isset($_COOKIE['success_message'])) {
    $successMessage = $_COOKIE['success_message'];
    // Hapus cookie pesan sukses agar tidak ditampilkan lagi
    setcookie('success_message', '', time() - 3600, '/');
}
?>
