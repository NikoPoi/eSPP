<?php
include '../connection.php';

$sql ="SELECT * FROM pembayaran as a LEFT JOIN siswa as b ON a.nisn = b.nisn LEFT JOIN spp as c ON a.id_spp = c.id_spp LEFT JOIN petugas as 
d ON a.id_petugas = d.id_petugas  ";

$query = mysqli_query($conn, $sql);


echo '<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col" class="text-center">ID</th>
    <th scope="col">Petugas</th>
    <th scope="col">NISN | Nama</th>
    <th scope="col">Tanggal Bayar</th>
    <th scope="col">Bulan Bayar</th>
    <th scope="col">Tahun Bayar</th>
    <th scope="col">ID SPP</th>
    <th scope="col">Jumlah Bayar</th>
    <th scope="col" class="col-2 text-center">Opsi</th>
    </tr>
</thead>
<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
    $nominal =$row['nominal'] ;
    $jumlah_bayar =$row['jumlah_bayar'];
	echo '
        <tr>
			<td class="text-center">'.$row['id_pembayaran'].'</td>
			<td>'.$row['nama_petugas'].'</td>
			<td>'.$row['nisn'].' | '.$row['nama'].'</td>
			<td>'.$row['tgl_bayar'].'</td>
			<td>'.$row['bulan_bayar'].'</td>
			<td>'.$row['tahun_bayar'].'</td>
			<td>Rp. '.number_format($nominal).'</td>
			<td>Rp. '.number_format($jumlah_bayar).'</td>
            <td class="text-center">
            <a class="btn btn-primary px-3" href="./edit/editPembayaran.php?id='.$row['id_pembayaran'].'">Edit</a> |
            <a class="btn btn-danger" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="../server/api-pembayaran/deleteData.php?id='.$row['id_pembayaran'].'" >Hapus</a>
            </td>
		</tr>';
}
echo '
	</tbody>
</table>';
mysqli_free_result($query);


mysqli_close($conn);
?>

<!-- <a class="btn btn-danger" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="api/HapusData.php?id='.$row['id_pembayaran'].'" >Hapus</a> -->

