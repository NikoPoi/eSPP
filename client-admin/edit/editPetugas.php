<?php
  // Ini conneksi
include '../../connection.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM petugas WHERE id_petugas='$id'";
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
        <title>Edit Petugas | SPP</title>
    </head>
    <body>
            <!-- Navbar-->
            <?php
                include('./components/navbar.php')
            ?>
                <!-- Page content-->
                <div class="container-fluid">
                <form method="post" action="../../server/api-petugas/editData.php">
                    <div class="container card shadow mt-4">
                        <div class="card-body m-3">
                        <h1>Edit Data Petugas <?php echo $data['nama_petugas']; ?></h1>
                            <div class="card-text m-2">
                            <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="h6">Username</div>
                                        <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control col-md-8">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="h6">Password</div>
                                        <input type="text" name="password" value="<?php echo $data['password']; ?>" class="form-control col-md-8">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <div class="row">
                                            <div class="h6">Nama Petugas</div>
                                            <input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" class="form-control col-md-8">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-4 h6" >Level</label>
                                        <select name="level" class="form-control">
                                            <option value="<?php echo $data['level']; ?>" selected > <?php echo $data['level']; ?></option>
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <input href="petugas.php" type="submit" class="btn btn-primary col-10 m-2">
                                        <a href="../petugas.php" class="btn btn-danger col m-2">Back</a>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        <!-- Bootstrap core JS-->
        <?php
            include('./components/footer.php')
        ?>
        <!-- Core theme JS-->
        <script src="asset/js/scripts.js"></script>
    </body>
</html>
