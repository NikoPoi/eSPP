<?php
include '../connection.php';



$sql ="SELECT * FROM pembayaran as a LEFT JOIN siswa as b ON a.nisn = b.nisn LEFT JOIN spp as c ON a.id_spp = c.id_spp LEFT JOIN petugas as 
d ON a.id_petugas = d.id_petugas LEFT JOIN kelas as e ON b.id_kelas = e.id_kelas ";

$query = mysqli_query($conn, $sql);

		
while ($row = mysqli_fetch_array($query))
{
    $nominal =$row['nominal'] ;
    $jumlah_bayar =$row['jumlah_bayar'];


echo '<div class="card mt-3 mb-2">
        <div class="card-body mx-4 row align-content-center mb-4">
            <div class="card-text mt-3 col">
                <div class="display-5 fw-normal mb-3">'.$row['nama'].'</div>
                <p>
                    Nama : '.$row['nama'].' <br>
                    Kelas : '.$row['nama_kelas'].' <br>
                    Jumlah Transaksi : '.number_format($jumlah_bayar).' <br>
                    SPP Bulan : '.$row['bulan_bayar'].' <br>
                </p>
                <a href="../client-siswa/detail.php?id='.$row['id_pembayaran'].'" class="btn btn-primary px-5">Detail</a>
            </div>
            <div class="card-text col align-self-center text-end">
                <div class="display-5 fw-normal">Rp.'.number_format($jumlah_bayar).'</div>
            </div>
        </div>
    </div>';
}

mysqli_free_result($query);


mysqli_close($conn);

// echo '
//         <tr>
// 			<td>'.$row['id_pembayaran'].'</td>
// 			<td>'.$row['nama_petugas'].'</td>
// 			<td>'.$row['nisn'].' | '.$row['nama'].'</td>
// 			<td>'.$row['tgl_bayar'].'</td>
// 			<td>'.$row['bulan_bayar'].'</td>
// 			<td>'.$row['tahun_dibayar'].'</td>
// 			<td>Rp. '.number_format($nominal).'</td>
// 			<td>Rp. '.number_format($jmb_bayar).'</td>
//             <td>
//             <a href="EditPembayaran.php?id='.$row['id_pembayaran'].'">Edit</a> |
//             <a onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\')" href="api/HapusData.php?id='.$row['id_pembayaran'].'" >Hapus</a>
//             </td>
// 		</tr>';
?>