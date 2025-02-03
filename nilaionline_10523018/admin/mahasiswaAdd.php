<?php
include('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MAHASISWA</h3>
<br /><hr /><br />

<p>
<?php
if (!isset($_POST['submit'])) {
?>

    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
            <tr>
                <td width="27%">NIM</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nim" size="30" placeholder="NIM"</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input name="nama" type="text" id="nama" size="30" placeholder="NAMA" /></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>:</td>
                <td>
                    <label>
                        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jk" value="Perempuan"> Perempuan
                    </label>
                </td>
            </tr>
            <tr>
                <td height="50">JURUSAN</td>
                <td>:</td>
                <td>
                    <select name="jurusan">
                        <option value="">-=PILIH=-</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td>:</td>
                <td>
                    <input type="password" name="password" size="30" placeholder="PASSWORD">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <tr></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <tr></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="TAMBAH">
                </td>
            </tr>
        </table>
        </form>

        <?php
        }
        else
         {
            $nim        = $_POST['nim'];
            $nama       = $_POST['nama'];
            $jk         = $_POST['jk'];
            $jurusan    = $_POST['jurusan'];
            $password   = md5($_POST['password']);

            $insertMhs = "INSERT INTO mahasiswa VALUE ('$nim', '$nama', '$jk', '$jurusan', '$password')";
            $queryMhs = mysqli_query($koneksi, $insertMhs);

            if ($queryMhs) {
                echo "<script>alert('Data berhasil disimpan');</script>";
                echo "<script>window.location = 'mahasiswaView.php'</script>";
            } else {
                echo "<script>alert('Gagal menyimpan data');</script>";
                echo "<script>window.location = 'mahasiswaView.php'</script>";
            }
        }
        ?>
            <a href="mahasiswaView.php">&raquo KEMBALI </a>

