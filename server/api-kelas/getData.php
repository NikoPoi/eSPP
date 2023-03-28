<?php
include '../connection.php';

$sql ="SELECT * FROM kelas";

$query = mysqli_query($conn, $sql);


echo '<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col" class="text-center">ID</th>
    <th scope="col">Nama Kelas</th>
    <th scope="col">Kompetensi Keahlian</th>
    <th scope="col" class="text-center">Opsi</th>
    </tr>
</thead>
<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td class="text-center">'.$row['id_kelas'].'</td>
			<td>'.$row['nama_kelas'].'</td>
			<td>'.$row['kompetensi_keahlian'].'</td>
            <td class="text-center">
            <a class="btn btn-primary px-3" href="./edit/editKelas.php?id='.$row['id_kelas'].'">Edit</a> |
            <a class="hapus btn btn-danger" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="../server/api-kelas/deleteData.php?id='.$row['id_kelas'].'">Hapus</a>
            </td>
		</tr>';
}
echo '
	</tbody>
</table>';
mysqli_free_result($query);


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
        <!-- <script>
        function getId(elem){
            location.href = "../server/api-kelas/deleteData.php" + "?id=" + elem.value;
        }

        function hapus(){
                swal({
                    title: 'Delete',
                    text: 'Apakah anda yakin ingin menghapus?',
                    type: 'warning',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Cancel',
                    closeOnConfirm: false,
                    closeOnCancel: true
                }).then(okay => {
                if (okay) {
                    getId();
                }
            });
            };
        </script> -->
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</body>
</html>