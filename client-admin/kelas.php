<!DOCTYPE html>
<html lang="en">
    <head>
            <?php 
            include('./components/header.php')
            ?>
        <title>Kelas | SPP</title>
        
    </head>
    <body>
            <!-- Navbar -->
            <?php 
                include('./components/navbar.php')
            ?>

                <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                        <h1>Data Kelas Sekolah</h1>
                    <?php
                    include '../server/api-kelas/getData.php';
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
                                        <form action="../server/api-kelas/postData.php" method="post">
                                    <!-- <div class="form-group mb-2">
                                        <div class="row">
                                            <label class="col h6">ID Kelas</label>
                                            <input type="text" name="id_kelas" class="form-control col-md-8">
                                        </div>
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col h6">Nama Kelas</div>
                                            <input type="text" name="nama_kelas" class="form-control col-md-8" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <div class="col h6">Kompetensi Keahlian</div>
                                            <input type="text" name="jurusan" class="form-control col-md-8" required>
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
