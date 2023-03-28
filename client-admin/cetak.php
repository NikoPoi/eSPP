<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include('./components/header.php')
        ?>
        <title>Print</title>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">

                <!-- Page content-->
                <div class="container-fluid">
                <div class="container">
                        <h1>Data Histori Pembayaran</h1>
                    <?php
                    include '../server/api-pembayaran/getDataTable.php';
                    ?>    
                </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script>
            window.print();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="asset/js/scripts.js"></script>
    </body>
</html>
