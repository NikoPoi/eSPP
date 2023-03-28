<?php
include '../connection.php';

$sql ='SELECT * FROM  spp  ';

$query = mysqli_query($conn, $sql);
		
while ($row = mysqli_fetch_array($query))
{
    $nominal =$row['nominal'] ;

	echo   '
    <option value="'.$row['id_spp'].'">'.$row['tahun'].' | Rp. '.number_format($nominal).' </option>
            ';
}

mysqli_free_result($query);


mysqli_close($conn);
?>