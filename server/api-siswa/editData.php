<?php
include '../connection.php';
//menyimpan data kedalam variabel
$id    =$_POST['id'];
// $Data1 =$_POST['Data1'];
$nisn =$_POST['nisn'];
$nis =$_POST['nis'];
$nama =$_POST['nama'];
$id_kelas =$_POST['id_kelas'];
$alamat =$_POST['alamat'];
$no_telepon =$_POST['no_telepon'];
$id_spp =$_POST['id_spp'];

$query = "UPDATE siswa SET nisn='$nisn' , nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telepon', id_spp='$id_spp' WHERE nisn = '$id'";
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
                    window.location.href = "../../client-admin/siswa.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>