<?php 
    include '../connection.php';

    //menyimpan data kedalam variabel
    $id_kelas =$_POST['id_kelas'];
    // $Data1 =$_POST['Data1'];
    $nama_kelas =$_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];



    $query = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$jurusan' WHERE id_kelas = '$id_kelas'";
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
                    window.location.href = "../../client-admin/kelas.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>