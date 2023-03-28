<?php
  // memanggil file conneksi.php untuk membuat conneksi
include '../../connection.php';
// tenari
    // ['id'] == 0 ? $id : $id = ($_GET["id"]);

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM pembayaran as a LEFT JOIN siswa as b ON a.nisn = b.nisn LEFT JOIN spp as c ON a.id_spp = c.id_spp LEFT JOIN petugas as 
    d ON a.id_petugas = d.id_petugas  WHERE id_pembayaran ='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);

    $nominal =$data['nominal'] ;
    $HN = number_format($nominal);
    $jumlah_bayar = $data['jumlah_bayar'];
    $JB = number_format($jumlah_bayar);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php 
            include('./components/header.php')
            ?>
        <title>Edit Pembayaran | SPP</title>
    </head>
    <body>
        
            <!-- Sidebar-->
            <?php 
            include('./components/navbar.php')
            ?>
            
                <!-- Page content-->
            <div class="container-fluid">
                <form action="../../server/api-pembayaran/editData.php" method="post">
                    <div class="container mt-4 card shadow">
                        <div class="card-body m-3">
                            <div class="h1">Edit Pembayaran <?php $data['nama'] ?></div>
                            <div class="card-text m-2">
                                <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden>
                                <div class="form-group mb-3">
                                    <label class="h6">ID Petugas</label>
                                    <select name="id_petugas" class="form-control">
                                        <option value="<?php echo $data['id_petugas'] ?>" selected>
                                        <?php echo $data['nama_petugas'];?> | <?php echo $data['level'];?>
                                        </option>
                                        <?php 
                                            include('../../server/api-pembayaran/pilihPetugas.php')
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="h6">NISN</label>
                                    <select name="nisn" class="form-control">
                                        <option value="<?php echo $data['nisn'] ?>" selected>
                                        <?php echo $data['nisn'];?> | <?php echo $data['nama'];?>
                                        </option>
                                        
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="h6">Tanggal Bayar</label>
                                        <input type="text" name="tgl_bayar" value="<?php echo $data['tgl_bayar'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="h6">Bulan Bayar</label>
                                        <input type="text" name="bulan_bayar" value="<?php echo $data['bulan_bayar'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="h6">Tahun Bayar</label>
                                        <input type="text" name="tahun_bayar" value="<?php echo $data['tahun_bayar'] ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="h6">Jumlah Bayar</label>
                                    <input type="text" name="jumlah_bayar" value="<?php echo $data['jumlah_bayar'] ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="h6">ID SPP</label>
                                    <select name="id_spp" class="form-control">
                                        <option value="<?php echo $data['id_spp'];?>" selected>
                                        <?php echo $data['tahun'];?> | Rp. <?php echo $HN ?>
                                        </option>
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <input href="../pembayaran.php" type="submit" class="btn btn-primary col-10 m-2">
                                        <a class="btn btn-danger col m-2" href="../kelas.php" role="button">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        <?php 
            include('./components/footer.php')
            ?>
    </body>
</html>
