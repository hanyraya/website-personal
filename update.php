<?php
include "koneksi.php";

// Validasi input dari form
if (isset($_POST["nim"], $_POST["nama"], $_POST["email"], $_POST["pesan"])) {
    $nim = mysqli_real_escape_string($koneksi, $_POST["nim"]);
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $pesan = mysqli_real_escape_string($koneksi, $_POST["pesan"]);

    // Query untuk update data
    $update = mysqli_query($koneksi, 
        "UPDATE bukutamu SET 
        tb_nama='$nama', 
        tb_email='$email', 
        tb_pesan='$pesan' 
        WHERE tb_nim='$nim'"
    );

    // Redirect berdasarkan hasil query
    if ($update) {
        header("Location: menampilkan_data.php");
        exit;
    } else {
        // Tambahkan pesan error jika gagal
        echo "Error: " . mysqli_error($koneksi);
        header("Location: edit.php?nim=$nim");
        exit;
    }
} else {
    echo "Semua data harus diisi!";
    header("Location: edit.php");
    exit;
}
?>
