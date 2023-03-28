<?php
include '../connection.php';

$sql ='SELECT * FROM  petugas';

$query = mysqli_query($conn, $sql);
		
while ($row = mysqli_fetch_array($query))
{

	echo   '
    <option value="'.$row['id_petugas'].'">'.$row['nama_petugas'].' | '.$row['level'].' </option>
            ';
}

mysqli_free_result($query);


mysqli_close($conn);
?>