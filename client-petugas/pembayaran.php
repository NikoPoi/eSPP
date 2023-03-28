<!DOCTYPE html>
<html lang="en">
    <head>
            <?php 
            include('./components/header.php')
            ?>
        <title>Pembayaran | SPP</title>
    </head>
    <body>
            <!-- Navbar -->
            <?php 
                include('./components/navbar.php')
            ?>

                <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                        <h1>Data Pembayaran</h1>
                    <?php
                    include '../server/api-pembayaran/getData.php';
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
                                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH DATA PEMBAYARAN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-3">
                                        <form action="../server/api-pembayaran/postData.php" method="post">
                                    <!-- <div class="form-group mb-2">
                                        <div class="row">
                                            <label class="h6">ID Pembayaran</label>
                                            <input type="text" name="id_pembayaran" class="form-control col-md-8">
                                        </div>
                                    </div> -->
                                    <div class="row mb-1">
                                        <div class="form-group m-2 col">
                                            <div class="row">
                                                <div class="h6">ID Petugas</div>
                                                <select name="id_petugas" class="form-control">
                                                    <option value="NO OPTION SELECT" selected>Pilih Petugas</option>
                                                        <?php
                                                        include '../server/api-pembayaran/pilihPetugas.php'
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-2 col">
                                            <div class="row">
                                                <div class="h6">NISN</div>
                                                <select name="nisn" class="form-control">
                                                    <option value="NO OPTION SELECT" selected>Pilih NISN</option>
                                                        <?php
                                                        include '../server/api-pembayaran/pilihNisn.php'
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="form-group col">
                                            <label class="h6">Tanggal Bayar</label>
                                            <input type="text" class="form-control" name="tgl_bayar">
                                        </div>
                                        <div class="form-group col">
                                            <label class="h6">Bulan Bayar</label>
                                            <input type="text" class="form-control" name="bulan_bayar">
                                        </div>
                                        <div class="form-group col">
                                            <label class="h6">Tahun Bayar</label>
                                            <input type="text" class="form-control" name="tahun_bayar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="h6">Jumlah Bayar</label>
                                            <input type="number" class="form-control" name="jumlah_bayar">
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
