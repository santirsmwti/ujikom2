<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
    $nama_jalur = $_POST['nama_jalur'];
    $titik_awal = $_POST['titik_awal'];
    $titik_akhir = $_POST['titik_akhir'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $hari_operasional = $_POST['hari_operasional'];
    $nomor_polisi = $_POST['nomor_polisi'];
    $kapasitas = $_POST['kapasitas'];

    $sql = mysqli_query($koneksi, "INSERT INTO santiujikom (nama_jalur, titik_awal, titik_akhir, waktu_berangkat, waktu_tiba, hari_operasional, nomor_polisi, kapasitas) VALUES ('$nama_jalur', '$titik_awal', '$titik_akhir', '$waktu_berangkat', '$waktu_tiba', '$hari_operasional', '$nomor_polisi', '$kapasitas')");

    if ($sql) {
        echo '<script>alert("Data berhasil ditambahkan."); document.location="jadwal_angkot.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal menambahkan data.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Angkutan Umum</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css"> <!-- Custom CSS untuk tampilan unik -->
    <style>
        body {
            background-color: #8B0000; /* Merah tua */
            color: #fff; /* Teks putih */
            font-family: 'Arial', sans-serif;
        }
        h2 {
            color: #FFD700; /* Kuning untuk judul */
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem; /* Ukuran font untuk judul */
            text-shadow: 1px 1px 5px #000; /* Efek bayangan untuk judul */
        }
        .form-control {
            background-color: #222; /* Abu-abu gelap untuk input */
            color: #fff; /* Teks putih untuk input */
            border: 1px solid #FFD700; /* Kuning untuk border input */
            border-radius: 10px; /* Sudut membulat untuk input */
        }
        .form-control::placeholder {
            color: #ccc; /* Abu-abu terang untuk placeholder */
        }
        .btn-primary {
            background-color: #FFD700; /* Kuning untuk tombol */
            border: none; /* Hapus border */
            border-radius: 10px; /* Sudut membulat untuk tombol */
        }
        .btn-primary:hover {
            background-color: #FFC107; /* Kuning lebih terang saat hover */
        }
        .alert {
            background-color: #dc3545; /* Merah untuk alert */
            color: #fff; /* Teks putih untuk alert */
        }
        .form-group {
            margin-bottom: 20px; /* Spasi antara form group */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Jadwal Angkutan Umum</h2>
        <form action="tambah_angkot.php" method="post"> <!-- Perbaiki nama file di sini -->
            <div class="form-group">
                <label>Nama Jalur</label>
                <input type="text" name="nama_jalur" class="form-control" placeholder="Masukkan nama jalur" required>
            </div>
            <div class="form-group">
                <label>Titik Awal</label>
                <input type="text" name="titik_awal" class="form-control" placeholder="Masukkan titik awal" required>
            </div>
            <div class="form-group">
                <label>Titik Akhir</label>
                <input type="text" name="titik_akhir" class="form-control" placeholder="Masukkan titik akhir" required>
            </div>
            <div class="form-group">
                <label>Waktu Berangkat</label>
                <input type="time" name="waktu_berangkat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Waktu Tiba</label>
                <input type="time" name="waktu_tiba" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Hari Operasional</label>
                <input type="text" name="hari_operasional" class="form-control" placeholder="Masukkan hari operasional" required>
            </div>
            <div class="form-group">
                <label>Nomor Polisi</label>
                <input type="text" name="nomor_polisi" class="form-control" placeholder="Masukkan nomor polisi" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan kapasitas" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
