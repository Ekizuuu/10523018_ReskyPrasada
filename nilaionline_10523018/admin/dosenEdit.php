<?php
include ('../koneksi/koneksi.php');

$getNip = $_GET['nip'];
$editDosen = "SELECT * FROM dosen WHERE nip = '$getNip'";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);
?>

<h3>EDIT DATA DOSEN</h3>

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" value="<?php echo $dataDosen['nip']; ?>" readonly></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" value="<?php echo $dataDosen['nama']; ?>" required></td>
            </ ```php
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" value="<?php echo $dataDosen['kode_mtkul']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nama = $_POST["nama"];
    $kode_mtkul = $_POST["kode_mtkul"];

    $updateDosen = "UPDATE dosen SET nama='$nama', kode_mtkul='$kode_mtkul' WHERE nip='$getNip'";
    $queryUpdate = mysqli_query($koneksi, $updateDosen);

    if ($queryUpdate) {
        echo "<script>alert('Data Dosen Berhasil Diupdate!');</script>";
        echo "<script>window.location ='dosenView.php';</script>";
    } else {
        echo "<script>alert('Data Dosen Gagal Diupdate!');</script>";
    }
}
?>
<a href="dosenView.php">KEMBALI</a>