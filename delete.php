<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Menghapus data dari database
    $query = mysqli_query($koneksi, "DELETE FROM santiujikom WHERE id='$id'");
    
    if ($query) {
        echo '<script>alert("Data berhasil dihapus."); document.location="jadwal_angkot.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); document.location="jadwal_angkot.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); document.location="jadwal_angkot.php";</script>';
}
?>
