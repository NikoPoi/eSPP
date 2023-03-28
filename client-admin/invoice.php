<?php
    include('../connection.php');
    if (isset($_GET['id'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = ($_GET["id"]);
    
        // menampilkan data dari database yang mempunyai id=$id
        $query ="SELECT * FROM pembayaran as a LEFT JOIN siswa as b ON a.nisn = b.nisn LEFT JOIN spp as c ON a.id_spp = c.id_spp LEFT JOIN petugas as 
d ON a.id_petugas = d.id_petugas LEFT JOIN kelas as e ON b.id_kelas = e.id_kelas where id_pembayaran='$id' ";
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
        <title>Invoice | SPP</title>
        
    </head>
    <body>
            <!-- Navbar -->

                <!-- Page content-->
        <div id="source-html">
            <div class="container-fluid">
                <div class="mt-4">
                    <div class="card shadow">
                        <div class="card-body m-lg-4">
                            <div class="card-img-top">
                                <img class="img-fluid" src="../assets/img/logo-spp.png" alt="logo" width="150px" height="auto">
                            </div>
                            <div class="text-mute mt-4" style="color: #6d6e80;">
                                <?php echo $data['tgl_bayar'] ?> <?php echo $data['bulan_bayar'] ?>, <?php echo $data['tahun_bayar'] ?>
                            </div>
                            <div class="d-flex">
                                <div class="fw-normal display-4 ">
                                    INVOICE
                                </div>
                                <div class="display-4" style="color: #6d6e80 !important;">
                                    #<?php echo $data['nisn']; ?>
                                </div>    
                            </div>
                            <hr>
                            <div class="mx-4">
                                        <div class="h4 fw-bold">
                                            Invoice Untuk :
                                        </div>
                                        <div class="h5">
                                            <?php 
                                                echo $data['nama']
                                            ?>
                                        </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-7">    
                                        <div class="h6 fw-normal" style="color: #6d6e80;">
                                            <div class="row">
                                                <div class="col-lg-3">Alamat</div>
                                                <div class="col">
                                                    : <?php 
                                                        echo $data['alamat']
                                                    ?>
                                                </div> 
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-lg-3">No Telepon</div>
                                                <div class="col ">
                                                    : <?php 
                                                        echo $data['no_telp']
                                                    ?>
                                                </div>
                                            </div> <br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="h6 fw-normal" style="color: #6d6e80;">
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-4">Kelas</div>
                                                <div class="col">
                                                    : <?php 
                                                        echo $data['nama_kelas']
                                                    ?>
                                                </div> 
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-4">Jurusan</div>
                                                <div class="col">
                                                : <?php 
                                                        echo $data['kompetensi_keahlian']
                                                    ?>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="display-4 fw-normal">Pembayaran SPP</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-10">Item</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Uang Pembayaran SPP</td>
                                            <td>Rp. <?php 
                                                    echo number_format($data['jumlah_bayar'])
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row bg-warning py-3 px-2">
                                    <div class="col-lg-10 col-md-9">
                                        <div class="fw-bold text-dark">
                                            TOTAL
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-dark">
                                            Rp. <?php 
                                                echo number_format($data['jumlah_bayar'])
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-3 text-end">
            <button class="btn btn-primary" id="btn-export" onclick="exportHTML();">
                Simpan
            </button>
        </div>

        <?php 
            include('./components/footer.php')
        ?>
        <script>
            function exportHTML(){
                var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                        "xmlns='http://www.w3.org/TR/REC-html40'>"+
                        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
                var footer = "</body></html>";
                var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
                
                var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
                var fileDownload = document.createElement("a");
                document.body.appendChild(fileDownload);
                fileDownload.href = source;
                fileDownload.download = 'document.doc';
                fileDownload.click();
                document.body.removeChild(fileDownload);
            }
        </script>
    </body>
</html>
