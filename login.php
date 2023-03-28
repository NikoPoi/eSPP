<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstraps/css/bootstrap.min.css">
    <title>Halaman Login</title>
    <!-- <style>
        body {
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,90,121,1) 0%, rgba(0,212,255,1) 100%);
        }
    </style> -->
</head>
<body>
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 16vh;">
                <div class="card shadow-lg col rounded-4">
                    <div class="card-body m-5">
                        <div class="row align-items-center">
                            <div class="col text-center">
                                <img class="img-fluid" src="./assets/img/logo-spp.png" alt="logo" width="334px" height="230px">
                            </div>
                            <div class="col">
                                <div class="card-text">
                                    <div class="display-5 fw-normal mb-4">Login Dulu Bro!!</div>
                                </div>
                                <form action="./server/process_login.php" method="POST">
                                    <div class="form-group mb-4">
                                        <label for="" class="h6 fw-normal">Username</label>
                                        <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="" class="h6 fw-normal">Password</label>
                                        <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <a href="./dashboard.php"><button type="submit" class="btn btn-primary px-5 py-3 mb-2"><div class="fw-normal">Submit</div></button></a>
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="col text-center">
                                                <?php
                                                if (isset($_SESSION['login_gagal'])) {
                                                    echo '<div class="alert alert-warning text-center" role="alert">';
                                                    echo $_SESSION['login_gagal'];
                                                    echo '</div> ';
                                                    session_unset();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
    include('./client-admin/components/footer.php')
?>

</body>
</html>