<?php
include '../connection.php';

$sql ='SELECT * FROM  siswa';

$query = mysqli_query($conn, $sql);
		
while ($row = mysqli_fetch_array($query))
{

	echo   '
    <option value="'.$row['nisn'].'">'.$row['nisn'].' | '.$row['nama'].' </option>
            ';
}

mysqli_free_result($query);


mysqli_close($conn);
?>