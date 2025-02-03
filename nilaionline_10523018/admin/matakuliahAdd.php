<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MATAKULIAH</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" required></td>
            </tr>
            <tr>
                <td>NAMA MATAKULIAH</td>
                <td><input type="text" name="nama_mtkul" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $kode_mtkul = $_POST["kode_mtkul"];
    $nama_mtkul = $_POST["nama_mtkul"];

    $insertMatakuliah = "INSERT INTO matakuliah (kode_mtkul, nama_mtkul) VALUES ('$kode_mtkul', '$nama_mtkul')";
    $queryMatakuliah = mysqli_query($koneksi, $insertMatakuliah);

    if ($queryMatakuliah) {
        echo "<script>alert('Data Matakuliah Berhasil Disimpan!');</script>";
        echo "<script>window.location ='matakuliahView.php';</script>";
    } else {
        echo "<script>alert('Data Matakuliah Gagal Disimpan!');</script>";
    }
}
?>
<a href="matakuliahView.php">KEMBALI</a>