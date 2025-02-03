<?php
include "../koneksi/koneksi.php";

$queryMatakuliah = "SELECT * FROM matakuliah";
$resultMatakuliah = mysqli_query($koneksi, $queryMatakuliah);
$countMatakuliah = mysqli_num_rows($resultMatakuliah);
?>

<h3>DATA MATAKULIAH</h3>
<a href="matakuliahAdd.php">TAMBAH DATA MATAKULIAH</a>
<table border="1">
    <tr>
        <th>KODE MATAKULIAH</th>
        <th>NAMA MATAKULIAH</th>
        <th>AKSI</th>
    </tr>
<?php
if ($countMatakuliah > 0) {
    while($dataMatakuliah = mysqli_fetch_array($resultMatakuliah)) {
?>
<tr>
    <td><?php echo $dataMatakuliah['kode_mtkul']; ?></td>
    <td><?php echo $dataMatakuliah['nama_mtkul']; ?></td>
    <td>
        <a href="matakuliahEdit.php?kode_mtkul=<?php echo $dataMatakuliah['kode_mtkul']; ?>">Edit</a>
        <a href="matakuliahHapus.php?kode_mtkul=<?php echo $dataMatakuliah['kode_mtkul']; ?>">Hapus</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='3'>Belum ada Data Matakuliah</td></tr>";
}
?>
</table>