<?php
include '../connection.php';
//menyimpan data kedalam variabel
$nisn =$_POST['nisn'];
$nis =$_POST['nis'];
$nama =$_POST['nama'];
$id_kelas =$_POST['id_kelas'];
$alamat =$_POST['alamat'];
$no_telp =$_POST['no_telp'];
$id_spp =$_POST['id_spp'];

$query = "INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES ('$nisn', '$nis', '$nama','$id_kelas','$alamat','$no_telp','$id_spp')";
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
                window.location.href = "../../client-admin/siswa.php";
            }
        });
</script>
</body>
</html>