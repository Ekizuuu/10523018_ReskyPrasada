<?php
include "../koneksi/koneksi.php";

$queryMhs  = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query ($koneksi, $queryMhs);
$countMhs = mysqli_num_rows ($resultMhs);
?>

<h3> DATA MAHASISWA</h3>
<hr><br>
<a href="./?adm=mahasiswaAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MAHASISWA" ></a>
<br>
<br>
<table border="1" id="boxtable">
    <!--Tabel Mahasiswa-->
    <tr class="odd">
        <th>NIM</th>
        <th>NAMA</th>
        <th>JENIS KELAMIN</th>
        <th>JURUSAN</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
    </tr>
<?php
if ($countMhs > 0)
{
    while($dataMhs=mysqli_fetch_array($resultMhs, MYSQLI_NUM))
    {

?>
<tr class="add">
  <td class="value"><?php echo"$dataMhs[0]";?></td>
  <td class="value"><?php echo"$dataMhs[1]";?></td>
  <td class="value"><?php echo"$dataMhs[2]";?></td>
  <td class="value"><?php echo"$dataMhs[3]";?></td>
  <td class="value"><?php echo"$dataMhs[4]";?></td>
  <td class="value">
    <a href="mahasiswaEdit.php?nim=<?php echo $dataMhs[0]; ?>">Edit</a>
    <a href="mahasiswaDelete.php?nim=<?php echo $dataMhs[0]; ?>">Hapus</a>
  </td>
<tr>
</tr>

<?php
    }
}
else
{
    echo"<tr>
            <td colspan='9' align='center' height='20'>
            <div> Belum ada Data Mahasiswa</div></td>
        </tr>";
}
echo"</table>";