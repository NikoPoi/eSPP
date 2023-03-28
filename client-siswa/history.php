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
                        <h1>Data Histori Pembayaran</h1>
                        <?php
                            include('../server/api-histori/getDataHistoriSiswa.php')
                        ?>
                </div>
            </div>

        <?php 
            include('./components/footer.php')
        ?>
        
    </body>
</html>
