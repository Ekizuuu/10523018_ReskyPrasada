<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$getNip = $_GET['nip'];

$editNilai = "SELECT * FROM nilai WHERE nim='$getNim' AND nip='$getNip'";
$resultNilai = mysqli_query($koneksi, $editNilai);
$dataNilai = mysqli_fetch_array($resultNilai);

if (!isset($_POST['submit'])) {
?>
    <form method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="nim" class='form-control'>
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryMhs  ="select nim, nama from mahasiswa";
                            $resultMhs = mysqli_query($koneksi, $queryMhs);
                            while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                                if ($dataMhs[0] == $getNim) {
                                    echo "<option value='$dataMhs[0]' selected>$dataMhs[1]</option>";
                                } else {
                                    echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
                                }
                            } 
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="nip" class='form-control'>
                            <option value="">-=PILIH=-</option>
                            <?php
                            $queryDosen  ="select nip, nama from dosen";
                            $resultDosen = mysqli_query($koneksi, $queryDosen);
                            while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)){
                                if ($dataDosen[0] == $getNip) {
                                    echo "<option value='$dataDosen[0]' selected>$dataDosen[1]</option>";
                                } else {
                                    echo "<option value='$dataDosen[0]'>$dataDosen[1]</option>";
                                }
                            }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>Nilai Tugas</td>
                <td>:</td>
                <td><input type="text" name="nl_tugas" value="<?php echo $dataNilai['nl_tugas']; ?>"></td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td>:</td>
                <td><input type="text" name="nl_uts" value="<?php echo $dataNilai['nl_uts']; ?>"></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td>:</td>
                <td><input type="text" name="nl_uas" value="<?php echo $dataNilai['nl_uas']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    $nim = $_POST["nim"];
    $nip = $_POST["nip"];
    $nl_tugas = $_POST["nl_tugas"];
    $nl_uts = $_POST["nl_uts"];
    $nl_uas = $_POST["nl_uas"];

    $updateNilai = "UPDATE nilai SET nl_tugas='$nl_tugas', nl_uts='$nl_uts', nl_uas='$nl_uas' WHERE nim='$nim' AND nip='$nip'";
    $queryUpdate = mysqli_query($koneksi, $updateNilai);

    if ($queryUpdate) {
        echo "<script>alert('Data Nilai Berhasil Diupdate!');</script>";
        echo "<script>window.location ='http://localhost/nilaionline_10523018/admin/nilaiView.php';</script>";

    } else {
        echo "<script>alert('Data Nilai Gagal Diupdate!');</script>";
    }
}
?>
