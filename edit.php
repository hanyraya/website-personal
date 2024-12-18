<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP dan MYSQL - Form Edit Data Buku</title>
    <style>
        h2 {
            text-align: center;
        }
        table {
            width: 600px;
            border: 1px solid black;
            border-collapse: collapse;
            margin: 30px auto;
        }
        table td {
            padding: 10px;
            font-size: 15px;
            vertical-align: top;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            box-sizing: border-box;
        }
        .form-buttons {
            text-align: center;
        }
        .form-buttons input {
            width: 100px;
            padding: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        input[type="reset"]:hover {
            background: red;
            border: 1px solid black;
            color: white;
        }
        input[type="submit"]:hover {
            background: green;
            border: 1px solid black;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Form Edit Data Buku Tamu</h2>
    <?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    $data = mysqli_query($koneksi,"select * from bukutamu where tb_nim='$nim'");
    while($row = mysqli_fetch_array($data)) {
    ?>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="integer" name="nim" placeholder="Masukkan NIM" 
                value="<?php echo $row['tb_nim'];?>" size="11" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="varchar" name="nama" placeholder="Masukkan Nama Lengkap"
                value="<?php echo $row['tb_nama'];?>" size="30" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="varchar" name="email" placeholder="Masukkan Alamat Email"
                value="<?php echo $row['tb_email'];?>" size="11" required></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td><input type="varchar" name="pesan" placeholder="Masukkan pesan atau kalimat panjang..."
                value="<?php echo $row['tb_pesan'];?>" size="11" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="edit" value="Edit">
                    <input type="reset" name="batal" value="Batal">
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>
</html>
