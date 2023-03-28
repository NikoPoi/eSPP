<?php
include '../connection.php';

$sql ='SELECT * FROM kelas ';

$query = mysqli_query($conn, $sql);

		
while ($row = mysqli_fetch_array($query))
{
	echo   '
    <option value="'.$row['id_kelas'].'">'.$row['nama_kelas'].'|'.$row['kompetensi_keahlian'].' </option>
            ';
}

mysqli_free_result($query);


mysqli_close($conn);
?>