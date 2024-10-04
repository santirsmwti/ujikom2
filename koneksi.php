<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'santi');

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
