<?php
include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA NILAI</h3>
<br /><hr /><br />

<?php
if (!isset($_POST['submit']))
{
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">

            <tr>
                <td height="50"> NAMA MAHASISWA </td>
                <td>:</td>
                <td>
                    <label>
                        <select name="mhs" class='form-control'>
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryMhs ="select nim, nama from mahasiswa";
                            $resultMhs =mysqli_query($koneksi, $queryMhs);
                            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                                echo"<option value ='$dataMhs[0]'> $dataMhs[1]</option>";
                            }
                            ?>
                            </select>
            </tr>
            <tr>
                <td height="50"> NAMA DOSEN </td>
                <td>:</td>
                <td>
                    <label>
                        <select name="dosen" class='form-control'>
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryMhs ="select nip, nama from dosen";
                            $resultMhs =mysqli_query($koneksi, $queryMhs);
                            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                                echo"<option value ='$dataMhs[0]'> $dataMhs[1]</option>";
                            }
                            ?>
                            </select>
            </tr>

            <tr>
                <td>NILAI TUGAS</td>
                <td>:</td>
                <td><input name="tugas" type="text" id="tugas" size="30" placeholder="TUGAS"></td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td><input name="uts" type="text" id="tugas" size="30" placeholder="UTS"></td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td><input name="uas" type="text" id="tugas" size="30" placeholder="UAS"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input id="submit" name="submit" type="submit" value="TAMBAH">
                </td>
            </tr>
        </table>
    </form>
<?php
}
else
{
    $mhs = $_POST["mhs"];
    $dosen = $_POST["dosen"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    // Input Data Mahasiswa
    $insertnilai = "INSERT INTO nilai VALUE ('$tugas','$uts','$uas','$mhs','$dosen')";
    $querynilai = mysqli_query($koneksi, $insertnilai);

    if ($querynilai)
    {
        echo "<script>alert('Daftar Berhasil Disimpan !');</script>";
        echo "<script type='text/javascript'>window.location ='nilaiView.php'</script>";
    }
    else
    {
        echo "<script>alert('Daftar Gagal Disimpan !');</script>";
        echo "<script type='text/javascript'>window.location ='nilaiView.php'</script>";
    }
}
?>
<a href="mahasiswaView.php">&raquo : KEMBALI </a>