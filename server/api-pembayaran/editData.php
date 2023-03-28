<?php
include '../connection.php';
//menyimpan data kedalam variabel
$id    =$_POST['id'];

$id_petugas =$_POST['id_petugas'];
$nisn =$_POST['nisn'];
$tgl_bayar =$_POST['tgl_bayar'];
$bulan_bayar =$_POST['bulan_bayar'];
$tahun_bayar =$_POST['tahun_bayar'];
$id_spp =$_POST['id_spp'];
$jumlah_bayar =$_POST['jumlah_bayar'];


$query = "UPDATE pembayaran SET id_petugas = '$id_petugas',nisn ='$nisn', tgl_bayar='$tgl_bayar', bulan_bayar='$bulan_bayar',  tahun_bayar='$tahun_bayar', id_spp='$id_spp', jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran = '$id'";
mysqli_query($kon, $query);

echo "<script>alert('Data berhasil diubah.');window.location='../pembayaran.php';</script>";

?>