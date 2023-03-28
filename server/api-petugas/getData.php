<?php
include '../connection.php';

$sql ="SELECT * FROM petugas  ";

$query = mysqli_query($conn, $sql);


echo '<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Username</th>
    <th scope="col">Password</th>
    <th scope="col">Nama Petugas</th>
    <th scope="col">Level</th>
    <th scope="col" class="col-2 text-center">Opsi</th>
    </tr>
</thead>
<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '
        <tr>
			<td>'.$row['id_petugas'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.$row['password'].'</td>
			<td>'.$row['nama_petugas'].'</td>
			<td>'.$row['level'].'</td>
            <td class="text-center">
                <a class="btn btn-primary px-3" href="./edit/editPetugas.php?id='.$row['id_petugas'].'">Edit</a> |
                <a class="btn btn-danger" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="../server/api-petugas/deleteData.php?id='.$row['id_petugas'].'" >Hapus</a>
            </td>
		</tr>';
}
echo '
	</tbody>
</table>';
mysqli_free_result($query);


mysqli_close($conn);
?>