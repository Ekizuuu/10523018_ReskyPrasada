<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$getNip = $_GET['nip'];

$deleteNilai = "DELETE FROM nilai WHERE nim='$getNim' AND nip='$getNip'";
$queryDelete = mysqli_query($koneksi, $deleteNilai);

if ($queryDelete) {
    echo "<script>alert('Data Nilai Berhasil Dihapus!');</script>";
    echo "<script>window.location ='http://localhost/nilaionline_10523018/admin/nilaiView.php';</script>";

} else {
    echo "<script>alert('Data Nilai Gagal Dihapus!');</script>";
}
?>
