<!DOCTYPE html>
<html lang="en">
    <head>
            <?php 
            include('./components/header.php')
            ?>
        <title>Histori | SPP</title>
        
    </head>
    <body>
            <!-- Navbar -->
            <?php 
                include('./components/navbar.php')
            ?>

                <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <h1 class="col">Data Histori Pembayaran</h1>
                        <a href="./cetak.php" target="_blank" class="col text-end">
                            <button class="btn btn-primary">
                                Cetak Semua
                            </button>
                        </a>
                    </div>
                        <?php
                            include('../server/api-histori/getData.php')
                        ?>
                </div>
            </div>

        <?php 
            include('./components/footer.php')
        ?>
        
    </body>
</html>
