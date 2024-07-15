<?php
session_start();

// Informasi koneksi database
$hostname = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "db_pdam"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($hostname, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Anda dapat menggunakan SQL untuk memeriksa kredensial pengguna di sini
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil, set sesi atau variabel sesuai kebutuhan Anda
        $_SESSION["username"] = $username;
        // Redirect ke halaman dashboard atau halaman lainnya
        header("Location: dashboard.html");
        exit();
    } else {
        // Login gagal, tampilkan pesan kesalahan atau redirect ke halaman lain
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}

// Tutup koneksi
$conn->close();
?>
