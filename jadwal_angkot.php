<?php
session_start(); // Tambahkan ini di atas sebelum penggunaan $_SESSION

// Pastikan Anda sudah melakukan pengecekan apakah pengguna sudah login atau tidak
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Angkutan Umum</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #8B0000; /* Merah tua */
            color: #fff; /* Teks putih */
        }
        .table-dark th {
            background-color: #900; /* Merah tua untuk header tabel */
            color: #FFD700; /* Teks kuning di header */
        }
        .table-dark td {
            background-color: #222; /* Abu-abu gelap untuk baris tabel */
            color: #fff; /* Teks putih untuk baris tabel */
        }
        h2 {
            color: #FFD700; /* Kuning untuk judul */
            text-align: center;
            margin: 20px 0;
        }
        .sidebar {
            background-color: #900; /* Merah tua */
            border-right: 5px solid #FFD700; /* Border kuning di sebelah kanan */
            padding: 15px; /* Spasi di dalam sidebar */
            border-radius: 0; /* Sudut tajam untuk sidebar */
            height: 100vh; /* Memastikan sidebar memenuhi tinggi halaman */
            position: fixed; /* Membuat sidebar tetap di kiri */
            width: 200px; /* Lebar sidebar */
            top: 0; /* Menjaga sidebar tetap di atas */
            left: 0; /* Menjaga sidebar tetap di kiri */
        }
        .sidebar a {
            color: #FFD700; /* Kuning untuk teks link sidebar */
            display: block; /* Agar setiap link berada di baris baru */
            margin-bottom: 10px; /* Spasi antara link */
            font-weight: bold; /* Tebalkan font link */
            padding: 10px; /* Spasi dalam link */
            border-radius: 5px; /* Sudut membulat untuk link */
            transition: background 0.3s; /* Efek transisi untuk hover */
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Latar belakang putih transparan saat hover */
            color: #FFD700; /* Kuning saat hover */
        }
        .main-content {
            margin-left: 220px; /* Spasi untuk sidebar */
            margin-top: 70px; /* Jarak dari atas */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Menu</h4>
        <a href="jadwal_angkot.php">Home</a>
        <a href="tambah_angkot.php">Tambah Angkot</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container main-content">
        <h2>Jadwal Angkutan Umum</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jalur</th>
                    <th>Titik Awal</th>
                    <th>Titik Akhir</th>
                    <th>Waktu Berangkat</th>
                    <th>Waktu Tiba</th>
                    <th>Hari Operasional</th>
                    <th>Nomor Polisi</th>
                    <th>Kapasitas</th>
                    <?php if ($_SESSION['username'] == 'admin') { ?>
                    <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');

                $query = mysqli_query($koneksi, "SELECT * FROM santiujikom");
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$data['nama_jalur']}</td>
                            <td>{$data['titik_awal']}</td>
                            <td>{$data['titik_akhir']}</td>
                            <td>{$data['waktu_berangkat']}</td>
                            <td>{$data['waktu_tiba']}</td>
                            <td>{$data['hari_operasional']}</td>
                            <td>{$data['nomor_polisi']}</td>
                            <td>{$data['kapasitas']}</td>
                            <td>";
                    if ($_SESSION['username'] == 'admin') {
                        echo "
                            <a href='edit.php?id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Delete</a>
                        ";
                    }
                    echo "</td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
