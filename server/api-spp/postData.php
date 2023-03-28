<?php
include '../connection.php';
//menyimpan data kedalam variabel

$tahun =$_POST['tahun'];
$nominal =$_POST['nominal'];


$query = "INSERT INTO spp (tahun, nominal) VALUES ('$tahun', '$nominal')";
mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>

<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<script>
    swal({ title: "SUKSES",
            text: "Berhasil Menambah Data",
            type: "success",
            icon: "success"
        }).then(okay => {
            if (okay) {
                window.location.href = "../../client-admin/spp.php";
            }
        });
</script>
</body>
</html>