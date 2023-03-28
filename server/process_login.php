<?php
session_start();

include "../connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$staff = mysqli_query($conn,"select * from petugas where username='$username' and password='$password'");

$murid = mysqli_query($conn, "select * from siswa where nisn='$username' and nis='$password'");


if (mysqli_num_rows($staff) != null) {

    $data = mysqli_fetch_assoc($staff);

    if($data['level']=="petugas"){
        $_SESSION['username'] = $data['username'];
        $_SESSION['id'] = $data['id_petugas'];
        $_SESSION['level'] = 'petugas';
        // echo 'kamu adalah staff';
        // echo $_SESSION['id'];
        header("Location: ../client-petugas/index.php");

    } else if($data['level']=="admin"){
        $_SESSION['username'] = $data['username'];
        $_SESSION['id'] = $data['id_petugas'];
        $_SESSION['level'] = 'admin';
        // echo 'kamu adalah admin';
        // echo $_SESSION['id'];
        header("Location: ../client-admin/index.php");
    }
}else if (mysqli_num_rows($murid) != null) {

    $data2 = mysqli_fetch_assoc($murid);

    $_SESSION['id'] = $data2['nisn'];
    $_SESSION['nama'] = $data2['nama'];

    echo $_SESSION['nama'];
    echo 'kamu adalah siswa <br>';
    header('location:../client-siswa/index.php');
}else {
    $_SESSION['login_gagal'] = "Username dan password salah" ;
    header("Location: ../login.php");

};
?>