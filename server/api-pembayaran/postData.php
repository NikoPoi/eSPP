<?php
include '../connection.php';
//menyimpan data kedalam variabel
//$id_pembayaran =$_POST['id_pembayaran'];
$id_petugas =$_POST['id_petugas'];
$nisn =$_POST['nisn'];
$tgl_bayar =$_POST['tgl_bayar'];
$bulan_bayar =$_POST['bulan_bayar'];
$tahun_bayar =$_POST['tahun_bayar'];
// $Data7 =$_POST['Data7'];
$jumlah_bayar =$_POST['jumlah_bayar'];

$test = "SELECT * FROM siswa Where nisn ='$nisn'";

$result = mysqli_query($conn, $test);


$row = mysqli_fetch_array($result);
$id_spp = $row['id_spp'];

	// echo $id_spp ;

$query = "INSERT INTO pembayaran (id_petugas, nisn, tgl_bayar, bulan_bayar,tahun_bayar,id_spp, jumlah_bayar) 
            VALUES ('$id_petugas', '$nisn', '$tgl_bayar','$bulan_bayar','$tahun_bayar','$id_spp','$jumlah_bayar')";

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
                    window.location.href = "../../client-admin/pembayaran.php";
                }
            });
    </script>
    <!-- window.location.href = "../../client/kelas.php"; -->
</html>