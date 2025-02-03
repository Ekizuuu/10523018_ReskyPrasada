<?php
include ('../koneksi/koneksi.php');

$getKodeMtkul = $_GET['kode_mtkul'];
$deleteMatakuliah = "DELETE FROM matakuliah WHERE kode_mtkul='$getKodeMtkul'";
$queryDelete = mysqli_query($koneksi, $deleteMatakuliah);

if ($queryDelete) {
    echo "<script>alert('Data Matakuliah Berhasil Dihapus!');</script>";
    echo "<script>window.location ='matakuliahView.php';</script>";
} else {
    echo "<script>alert('Data Matakuliah Gagal Dihapus!');</script>";
}
?>