<!DOCTYPE html>
<html lang="en">
    <head>
            <?php 
            include('./components/header.php')
            ?>
        <title>Siswa | SPP</title>
        
    </head>
    <body>
            <!-- Navbar -->
            <?php 
                include('./components/navbar.php')
            ?>

                <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                        <h1>Data Siswa</h1>
                    <?php
                    include '../server/api-siswa/getData.php';
                    ?>    

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary px-4 py-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH DATA KELAS</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-3">
                                        <form action="../server/api-siswa/postData.php" method="post">
                                    <!-- <div class="form-group mb-2">
                                        <div class="row">
                                            <label class="col h6">ID Kelas</label>
                                            <input type="text" name="id_kelas" class="form-control col-md-8">
                                        </div>
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col h6">NISN</div>
                                            <input type="number" name="nisn" class="form-control col-md-8" min="1" max="99999999999">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <div class="col h6">NIS</div>
                                            <input type="number" name="nis" class="form-control col-md-8" min="1" max="99999999999">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="row">
                                                <div class="col h6">Nama</div>
                                                <input type="text" name="nama" class="form-control col-md-8">
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <div class="row">
                                                <div class="h6">Kelas</div>
                                                <select name="id_kelas" class="form-control">
                                                    <option value="NO OPTION SELECT" selected>Pilih Kelas</option>
                                                        <?php
                                                        include '../server/api-siswa/pilihKelas.php'
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <div class="col h6">Alamat</div>
                                            <input type="text" name="alamat" class="form-control col-md-8">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <div class="col h6">No Telepon</div>
                                            <input type="number" name="no_telepon" class="form-control col-md-8">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                            <div class="row">
                                                <div class="h6">SPP</div>
                                                <select name="id_spp" class="form-control">
                                                    <option value="NO OPTION SELECT" selected>Pilih SPP</option>
                                                        <?php
                                                        include '../server/api-siswa/pilihSpp.php'
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    <!-- <div class="form-group">
                                        <div class="row">
                                            <input href="kelas.php" type="submit" class="btn btn-primary">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <input href="kelas.php" type="submit" class="btn btn-primary">
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php 
            include('./components/footer.php')
        ?>
        
    </body>
</html>
