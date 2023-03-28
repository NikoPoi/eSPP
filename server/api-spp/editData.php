<?php
include '../connection.php';
//menyimpan data kedalam variabel
$id    =$_POST['id'];
// $Data1 =$_POST['Data1'];
$tahun =$_POST['tahun'];
$nominal =$_POST['nominal'];



$query = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp = '$id'";
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
    </body>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script>
        swal({ title: "SUKSES",
                text: "Berhasil Mengubah Data",
                type: "success",
                icon: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../../client-admin/spp.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>