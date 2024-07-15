<!DOCTYPE html>
<html>
<head>
    <title>Profil Anda</title>
</head>
<body>
    <h1>Selamat datang di Profil Anda</h1>

    <?php
    // Sambungan ke database
    $db = new mysqli('localhost', 'root', '', 'db_pdam');

    // Periksa koneksi database
    if ($db->connect_error) {
        die("Koneksi gagal: " . $db->connect_error);
    }

    // Ambil informasi pengguna dari database
    $username = $_SESSION['username']; // Anda harus memiliki sesi yang tersimpan setelah login
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Nama: " . $row['nama'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        // Tampilkan informasi profil lainnya
    } else {
        echo "Data pengguna tidak ditemukan.";
    }

    // Tutup sambungan database
    $db->close();
    ?>

    <a href="logout.php">Keluar</a> <!-- Tautan untuk logout -->
</body>
</html>
