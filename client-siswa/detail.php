<?php
    include('../connection.php');
    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET["id"]);
    
        // menampilkan data dari database yang mempunyai id=$id
        $query ="SELECT * FROM pembayaran as a LEFT JOIN siswa as b ON a.nisn = b.nisn LEFT JOIN spp as c ON a.id_spp = c.id_spp LEFT JOIN petugas as 
d ON a.id_petugas = d.id_petugas LEFT JOIN kelas as e ON b.id_kelas = e.id_kelas where id_pembayaran='$id' ";
        $result = mysqli_query($conn, $query);
        // jika data gagal diambil maka akan tampil error berikut
        if(!$result){
          die ("Query Error: ".mysqli_errno($conn).
             " - ".mysqli_error($conn));
        }
        // mengambil data dari database
        $data = mysqli_fetch_assoc($result);
          // apabila data tidak ada pada database maka akan dijalankan perintah ini
           if (!count($data)) {
              echo "<script>alert('Data tidak ditemukan pada database');window.location='../index.php';</script>";
           }
      } else {
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.');window.location='../index.php';</script>";
      } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <?php 
            include('./components/header.php')
            ?>
    <title>Detail | SPP</title>
</head>
<body>
    <!-- Navbar -->
    <?php 
        include('./components/navbar.php')
    ?>

<div class="container-fluid">
                <div class="container card shadow">
                    <div class="card-body m-2">
                        <div class="h1">Detail Pembayaran <?php echo $data['nama'] ?></div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="h6">Nama</label>
                                <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="h6">Kelas</label>
                                <input type="text" value="<?php echo $data['nama_kelas'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="h6">NIS</label>
                                <input type="text" value="<?php echo $data['nis'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="h6">NISN</label>
                                <input type="text" value="<?php echo $data['nisn'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="h6">No Telepon</label>
                                <input type="text" value="<?php echo $data['no_telp'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="h6">Nama Petugas</label>
                                <input type="text" value="<?php echo $data['nama_petugas'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="h6">Tanggal</label>
                                <input type="text" value="<?php echo $data['tgl_bayar'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="h6">Bulan</label>
                                <input type="text" value="<?php echo $data['bulan_bayar'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="h6">Tahun</label>
                                <input type="text" value="<?php echo $data['tahun_bayar'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="h6">Jumlah Bayar</label>
                                <input type="text" value="<?php echo $data['jumlah_bayar'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary" href="./history.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            include('./components/footer.php')
        ?>
</body>
</html>