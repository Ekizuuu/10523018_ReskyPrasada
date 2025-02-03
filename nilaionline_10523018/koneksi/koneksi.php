<?php
$host       = "localhost";
$username   = "root";
$password   = "";
$nama_db    = "nilaionline";

$koneksi = mysqli_connect($host, $username, $password, $nama_db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>