<?php
include '../connection.php';
//menyimpan data kedalam variabel
$id    =$_POST['id'];
$username =$_POST['username'];
$password =$_POST['password'];
$nama_petugas =$_POST['nama_petugas'];
$level =$_POST['level'];



$query = "UPDATE petugas SET username='$username', password='$password', nama_petugas ='$nama_petugas', level='$level' WHERE id_petugas = '$id'";
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
                    window.location.href = "../../client-admin/petugas.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>