<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
?>

<h3>DATA DOSEN</h3>
<a href="./?adm=dosenAdd">TAMBAH DATA DOSEN</a>
<table border="1" id="boxtable">
    <tr class="odd">
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATAKULIAH</th>
        <th>AKSI</th>
        <th>PASSWORD</th>
    </tr>
<?php
if ($countDosen > 0) {
    while($dataDosen = mysqli_fetch_array($resultDosen)) {
?>
<tr>
    <td><?php echo $dataDosen['nip']; ?></td>
    <td><?php echo $dataDosen['nama']; ?></td>
    <td><?php echo $dataDosen['kode_mtkul']; ?></td>
    <td><?php echo $dataDosen['password']; ?></td>
    <td>
        <a href="dosenEdit.php?nip=<?php echo $dataDosen['nip']; ?>">Edit</a>
        <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>">Hapus</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='4'>Belum ada Data Dosen</td></tr>";
}
?>
</table>