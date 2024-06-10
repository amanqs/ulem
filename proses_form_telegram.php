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

    // Tampilkan pesan sukses atau error
    echo '<script>alert("Pesan berhasil dikirim!"); window.location.href = "https://amang-devs.my.id";</script>';
}
?>
