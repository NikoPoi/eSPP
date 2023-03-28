<!DOCTYPE html>
<html lang="en">
    <head>
    <?php 
            include('./components/header.php')
            ?>
        <title>Petugas | SPP</title>
        
    </head>
    <body>
            <!-- Sidebar-->
            <?php 
            include('./components/navbar.php')
            ?>
            
                <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                    <h1>Data Petugas </h1>
                    <div class="dropdown-divider"></div>
                    <?php
                    include '../server/api-petugas/getData.php';
                    ?>
                    
                    
                    <button type="button" class="btn btn-primary px-4 py-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH DATA PEMBAYARAN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-3">
                                        <form action="../server/api-petugas/postData.php" method="post">
                                    <!-- <div class="form-group mb-2">
                                        <div class="row">
                                            <label class="h6">ID Pembayaran</label>
                                            <input type="text" name="id_pembayaran" class="form-control col-md-8">
                                        </div>
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <label class="h6">Username</label>
                                            <input type="text" name="username" class="form-control col-md-8" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <label class="h6">Password</label>
                                            <input type="text" class="form-control col-md-8" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <label class="h6">Nama Petugas</label>
                                            <input type="text" class="form-control col-md-8" name="nama_petugas" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <div class="h6">Level Petugas</div>
                                                <select name="level" class="form-control" style="cursor: pointer;" required>
                                                    <option value="No Selected" selected >Pilih Level</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas </option>
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
                                    <input href="pembayaran.php" type="submit" class="btn btn-primary">
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
