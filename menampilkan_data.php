<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP dan MYSQL - Buku Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-container {
            margin: 20px;
            text-align: left;
        }
        .btn {
            background-color: #008CBA; /* Warna biru */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #007BB5; /* Warna biru saat hover */
        }
    </style>
</head>
<body>
    <div class="btn-container">
        <!-- Tombol "Kembali Ke Home" di kiri atas -->
        <a href="index.php" class="btn">Kembali Ke Home</a>
    </div>

    <h2>DATA BUKU TAMU</h2>

    <!-- Tabel Data -->
    <table>
        <tr bgcolor="yellow">
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Action</th>
        </tr>
        <?php
        include "koneksi.php";
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM bukutamu");
        while ($row = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['tb_nim']); ?></td>
            <td><?php echo htmlspecialchars($row['tb_nama']); ?></td>
            <td><?php echo htmlspecialchars($row['tb_email']); ?></td>
            <td><?php echo htmlspecialchars($row['tb_pesan']); ?></td>
            <td>
                <a href="edit.php?nim=<?php echo urlencode($row['tb_nim']); ?>">Edit</a> ||
                <a href="hapus.php?nim=<?php echo urlencode($row['tb_nim']); ?>"
                   onclick="return confirm('Apakah Yakin Anda Menghapus Data Ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
