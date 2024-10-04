<?php
session_start(); // Memulai sesi

// Menghapus semua variabel sesi
$_SESSION = array();

// Menghancurkan sesi
session_destroy();

// Mengarahkan pengguna ke halaman login atau halaman utama
header("Location: login.php"); // Ganti 'login.php' dengan halaman yang sesuai
exit;
?>
