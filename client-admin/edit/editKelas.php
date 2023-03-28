<?php
  // Ini conneksi
include '../../connection.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM kelas WHERE id_kelas='$id'";
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
        <title>Edit Kelas | SPP</title>
        
    </head>
    <body>
            <!-- Sidebar-->
            <?php 
            include('./components/navbar.php')
            ?>
            
                <!-- Page content-->
            <div class="container-fluid">
                <form method="post" action="../../server/api-kelas/editData.php">
                    <div class="container card mt-4 shadow">
                        <div class="card-body m-3">
                            <h1>Edit kelas <?php echo $data['nama_kelas']; ?></h1>
                            <div class="card-text m-2">
                                <input name="id_kelas" value="<?php echo $data['id_kelas']; ?>"  hidden />
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="h6">Nama Kelas</div>
                                        <input type="text" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" class="form-control col-md-8">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="h6">Kompetensi Keahlian</div>
                                        <input type="text" name="jurusan" value="<?php echo $data['kompetensi_keahlian']; ?>" class="form-control col-md-8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <input href="../kelas.php" type="submit" class="btn btn-primary col-10 m-2">
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
