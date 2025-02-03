<?php
include ('../koneksi/koneksi.php');

$getNip = $_GET['nip'];
$deleteDosen = "DELETE FROM dosen WHERE nip='$getNip'";
$queryDelete = mysqli_query($koneksi, $deleteDosen);

if ($queryDelete) {
    echo "<script>alert('Data Dosen Berhasil Dihapus!');</script>";
    echo "<script>window.location ='dosenView.php';</script>";
} else {
    echo "<script>alert('Data Dosen Gagal Dihapus!');</script>";
}
?>