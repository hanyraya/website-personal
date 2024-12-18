<?php

include "koneksi.php";
$nim = $_GET['nim'];
$hapus = mysqli_query($koneksi, "delete from bukutamu where tb_nim='$nim'");

if ($hapus){
    header("location:menampilkan_data.php");
}else{
    echo "Data Gagal Di Hapus";
}
?>