<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" required></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>KODE MATAKULIAH</td>
                <td><input type="text" name="kode_mtkul" required></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $kode_mtkul = $_POST["kode_mtkul"];
    $password = md5($_POST["password"]);

    $insertDosen = "INSERT INTO dosen (nip, nama, kode_mtkul, password) VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
    $queryDosen = mysqli_query($koneksi, $insertDosen);

    if ($queryDosen) {
        echo "<script>alert('Data Dosen Berhasil Disimpan!');</script>";
        echo "<script>window.location ='dosenView.php';</script>";
    } else {
        echo "<script>alert('Data Dosen Gagal Disimpan!');</script>";
    }
}
?>
<a href="dosenView.php">KEMBALI</a>