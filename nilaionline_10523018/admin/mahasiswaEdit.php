<?php
include('../koneksi/koneksi.php');

$getNim = mysqli_real_escape_string($koneksi, $_GET["nim"]);
$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);

if (!$dataMhs) {
    die("Data mahasiswa tidak ditemukan.");
}
?>

<h3>EDIT DATA MAHASISWA</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit'])) {
?>
<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NIM</td>
            <td width="4%">:</td>
            <td width="69%">
                <input type="text" name="nim" size="30" value="<?php echo htmlspecialchars($dataMhs['nim']); ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td>
                <input name="nama" type="text" id="nama" size="30" value="<?php echo htmlspecialchars($dataMhs['nama']); ?>">
            </td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td>
                <label>
                    <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] === 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] === 'Perempuan') ? 'checked' : ''; ?>> Perempuan
                </label>
            </td>
        </tr>
        <tr>
            <td>JURUSAN</td>
            <td>:</td>
            <td>
                <select name="jur">
                    <option value="<?php echo htmlspecialchars($dataMhs['jur']); ?>"><?php echo htmlspecialchars($dataMhs['jur']); ?></option>
                    <option value="">-PILIH-</option>
                    <option value="Sistem Informasi">SISTEM INFORMASI</option>
                    <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                    <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td>
                <input type="password" name="password" id="password" size="30">
                <small>Biarkan kosong jika tidak ingin mengubah password</small>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input id="submit" name="submit" type="submit" value="UBAH"></td>
        </tr>
    </table>
</form>

<?php
} else {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
    $jur = mysqli_real_escape_string($koneksi, $_POST['jur']);
    $password = !empty($_POST['password']) ? md5(mysqli_real_escape_string($koneksi, $_POST['password'])) : null;

    if (empty($nama) || empty($jk) || empty($jur)) {
        echo "<script>alert('Semua field kecuali password wajib diisi!');</script>";
    } else {
        $updateMhs = "UPDATE mahasiswa SET 
                        nama='$nama', 
                        jk='$jk', 
                        jur='$jur'" . 
                        ($password ? ", password='$password'" : "") . 
                     " WHERE nim='$nim'";
        
        $queryMhs = mysqli_query($koneksi, $updateMhs);

        if ($queryMhs) {
            echo "<script>alert('Data Berhasil Diubah');</script>";
            echo "<script>window.location = 'mahasiswaView.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');</script>";
        }
    }
}
?>
<a href="mahasiswaView.php">&raquo; KEMBALI</a>
