<?php
include '../connection.php';
//menyimpan data kedalam variabel

$nama_kelas =$_POST['nama_kelas'];
$jurusan =$_POST['jurusan'];


$query = "INSERT INTO kelas (nama_kelas, Kompetensi_keahlian) VALUES ('$nama_kelas', '$jurusan')";
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
                text: "Berhasil Menambah Data",
                type: "success",
                icon: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = "../../client-admin/kelas.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>