<?php
include '../connection.php';

$sql ="SELECT * FROM spp  ";

$query = mysqli_query($conn, $sql);

echo '<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">ID Spp</th>
        <th scope="col">Tahun</th>
        <th scope="col">Nominal</th>
        <th scope="col" class="text-center">Opsi</th>
    </tr>
</thead>
<tbody>';

while ($row = mysqli_fetch_array($query))
{
    $nominal =$row['nominal'] ;
	echo '
        <tr>
			<td>'.$row['id_spp'].'</td>
			<td>'.$row['tahun'].'</td>
			<td>Rp. '.number_format($nominal).'</td>
            <td class="text-center">
            <a class="btn btn-primary" href="./edit/editSPP.php?id='.$row['id_spp'].'">Edit</a> |
            <a class="btn btn-danger" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="../server/api-spp/deleteData.php?id='.$row['id_spp'].'" >Hapus</a>
            </td>
		</tr>';
}
echo '
	</tbody>
</table>';
mysqli_free_result($query);


mysqli_close($conn);
?>