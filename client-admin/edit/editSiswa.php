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
    $query = "SELECT * FROM siswa as a LEFT JOIN kelas as b ON a.id_kelas = b.id_kelas LEFT JOIN spp as c ON a.id_spp = c.id_spp    WHERE nisn='$id'";
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
        <title>Edit Siswa | SPP</title>
    </head>
    <body>
                <?php
                    include('./components/navbar.php')
                ?>
                <!-- Page content-->
                <div class="container-fluid">
                <form method="post" action="../../server/api-siswa/editData.php">
                    <div class="container card shadow">
                        <div class="card-body m-3">
                        <h1>Edit Data <?php echo $data['nama']; ?></h1>
                            <div class="card-text">
                                <input name="id" value="<?php echo $data['nisn']; ?>"  hidden />
                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <div class="h6">NISN</div>
                                        <input type="text" name="nisn" value="<?php echo $data['nisn']; ?>" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group col">
                                        <div class="h6">NIS</div>
                                        <input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control col-md-8">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <div class="h6">Nama</div>
                                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-3 h6" >Kelas</label>
                                        <select name="id_kelas" class="form-control">
                                        <option value="<?php echo $data['id_kelas']; ?>" selected><?php echo $data['nama_kelas']; ?> | <?php echo $data['kompetensi_keahlian']; ?></option>
                                                <?php
                                                    include '../../sever/api-siswa/pilihKelas.php'
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="h6">Alamat</div>
                                    <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control col-md-8">
                                </div>
                                <div class="row mb-2">
                                    <div class="form-group col">
                                        <div class="h6">No Telepon</div>
                                        <input type="text" name="no_telepon" value="<?php echo $data['no_telp']; ?>" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-3 h6" >ID Spp</label>
                                        <select name="id_spp" class="form-control">
                                        <option value="<?php echo $data['id_spp']; ?>" selected><?php echo $data['tahun']; ?> / Rp. <?php echo $HN ?> </option>
                                                <?php
                                                include '../../server/api-siswa/pilihSpp.php'
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <input href="siswa.php" type="submit" class="btn btn-primary col-10 m-2">
                                        <a href="../siswa.php" class="btn btn-danger col m-2">Kembali</a>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        <?php
            include('./components/footer.php')
        ?>
    </body>
</html>
