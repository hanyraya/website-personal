<?php
include "koneksi.php";
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$pesan = $_POST["pesan"];

$simpan = mysqli_query ($koneksi, "Insert Into bukutamu values('$nim','$nama','$email','$pesan')");
if ($simpan){
    header ("location:menampilkan_data.php");
}else{
    header("location:tambah_data.php");
}
?>
