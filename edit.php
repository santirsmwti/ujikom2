<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM santiujikom WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    
    if (!$data) {
        echo '<script>alert("Data tidak ditemukan."); document.location="jadwal_angkot.php";</script>';
    }
}

if (isset($_POST['submit'])) {
    $nama_jalur = $_POST['nama_jalur'];
    $titik_awal = $_POST['titik_awal'];
    $titik_akhir = $_POST['titik_akhir'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $hari_operasional = $_POST['hari_operasional'];
    $nomor_polisi = $_POST['nomor_polisi'];
    $kapasitas = $_POST['kapasitas'];

    $sql = mysqli_query($koneksi, "UPDATE santiujikom SET 
        nama_jalur='$nama_jalur', 
        titik_awal='$titik_awal', 
        titik_akhir='$titik_akhir', 
        waktu_berangkat='$waktu_berangkat', 
        waktu_tiba='$waktu_tiba', 
        hari_operasional='$hari_operasional', 
        nomor_polisi='$nomor_polisi', 
        kapasitas='$kapasitas' 
        WHERE id='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil diperbarui."); document.location="jadwal_angkot.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal memperbarui data.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Angkutan Umum</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
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
        <h2>Edit Jadwal Angkutan Umum</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post"> <!-- Perbaiki nama file di sini -->
            <div class="form-group">
                <label>Nama Jalur</label>
                <input type="text" name="nama_jalur" class="form-control" placeholder="Masukkan nama jalur" value="<?php echo $data['nama_jalur']; ?>" required>
            </div>
            <div class="form-group">
                <label>Titik Awal</label>
                <input type="text" name="titik_awal" class="form-control" placeholder="Masukkan titik awal" value="<?php echo $data['titik_awal']; ?>" required>
            </div>
            <div class="form-group">
                <label>Titik Akhir</label>
                <input type="text" name="titik_akhir" class="form-control" placeholder="Masukkan titik akhir" value="<?php echo $data['titik_akhir']; ?>" required>
            </div>
            <div class="form-group">
                <label>Waktu Berangkat</label>
                <input type="time" name="waktu_berangkat" class="form-control" value="<?php echo $data['waktu_berangkat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Waktu Tiba</label>
                <input type="time" name="waktu_tiba" class="form-control" value="<?php echo $data['waktu_tiba']; ?>" required>
            </div>
            <div class="form-group">
                <label>Hari Operasional</label>
                <input type="text" name="hari_operasional" class="form-control" placeholder="Masukkan hari operasional" value="<?php echo $data['hari_operasional']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor Polisi</label>
                <input type="text" name="nomor_polisi" class="form-control" placeholder="Masukkan nomor polisi" value="<?php echo $data['nomor_polisi']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan kapasitas" value="<?php echo $data['kapasitas']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
