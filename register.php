<?php
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
// Handle formulir pendaftaran di sini
if (isset($_POST['register'])) {
    // Dapatkan data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasiPassword = $_POST['konfirmasi-password'];
    
    // Verifikasi kata sandi
    if ($password !== $konfirmasiPassword) {
        echo "Kata sandi dan konfirmasi kata sandi tidak cocok.";
    } else {
        // menyimpan data ini ke database menggunakan SQL INSERT
        
        $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Pendaftaran berhasil!")</script>';
            echo '<script>window.location.href = "login.html";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Tutup koneksi
$conn->close();
?>
