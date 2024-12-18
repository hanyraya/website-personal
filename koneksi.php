<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "book";

// Membuat koneksi dengan penanganan error
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $koneksi = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $e) {
    die("Koneksi gagal: Silakan periksa konfigurasi database.");
}
?>