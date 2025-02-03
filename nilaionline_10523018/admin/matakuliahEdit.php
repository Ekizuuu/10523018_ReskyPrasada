<?php
include ('../koneksi/koneksi.php');

$getKodeMtkul = $_GET['kode_mtkul'];
$editMatakuliah = "SELECT * FROM matakuliah WHERE kode_mtkul = '$getKodeMtkul'";
$resultMatakuliah = mysqli_query($koneksi, $editMatakuliah);
$dataMatakuliah = mysqli_fetch_array($resultMatakuliah);
?>

<h3>EDIT DATA MATAKULIAH</h3>

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" value="<?php echo $dataMatakuliah['kode_mtkul']; ?>" readonly></td>
            </tr>
            <tr>
                <td>NAMA MATAKULIAH</td>
                <td><input type="text" name="nama_mtkul" value="<?php echo $dataMatakuliah['nama_mtkul']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nama_mtkul = $_POST["nama_mtkul"];

    $updateMatakuliah = "UPDATE matakuliah SET nama_mtkul='$nama_mtkul' WHERE kode_mtkul='$getKodeMtkul'";
    $queryUpdate = mysqli_query($koneksi, $updateMatakuliah);

    if ($queryUpdate) {
        echo "<script>alert('Data Matakuliah Berhasil Diupdate!');</script>";
        echo "<script>window.location ='matakuliahView.php';</script>";
    } else {
        echo "<script>alert('Data Matakuliah Gagal Diupdate!');</script>";
    }
}
?>
<a href="matakuliahView.php">KEMBALI</a>