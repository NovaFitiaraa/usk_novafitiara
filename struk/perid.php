<?php
require "../db.php";

$id_transaksi = $_GET['id_transaksi'] ?? 0;

$row = cetaltransaksi($id_transaksi);
$id_transaksi = $row['id_transaksi'];
$id_keb = $row['id_keb'];
$no_transaksi = $row['no_transaksi'];
$id_siswa = $row['id_siswa'];
$nis_siswa = $row['nis_siswa'];
$nama = $row['nama'];
$harga = $row['harga'];
$kelas = $row['kelas'];
$id_operator = $row['id_operator'];
$nama_operator = $row['nama_operator'];
$jenis_keb = $row['jenis_keb'];
$tempat = $row['tempat'];
$uang_bayar = $row['uang_bayar'];
$sisa_bayar = $row['sisa_bayar'];
$tanggal_waktu = $row['tanggal_waktu'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Cetak Struk</title>
</head>

<body>
    <div class="container">
        <hr class="mt-5">
        <h3 class="text-center">Nota Pembayaran Siswa</h3>
        <hr>
        <div class="container d-flex mx-auto">
            <div class="container a">
                <label for="" class="mt-2">No.Transaksi : <?= $no_transaksi ?></label><br>
                <label for="" class="">Tanggal : <?= $tanggal_waktu ?></label><br>
                <label for="" class="">Jam Cetak : <?= date('H:i:s'); ?></label><br>
            </div>
            <div class="container b mr-0">
                <label for="" class="mt-2">NIS Siswa : <?= $nis_siswa ?></label><br>
                <label for="" class="">Nama Siswa : <?= $nama ?></label><br>
                <label for="" class="">Kelas : <?= $kelas ?></label><br>
            </div>
        </div>
        <hr>
        <table class="container">
            <tr>
                <th class="py-1 px-2 text-center">No</th>
                <th class=" py-1 px-1">Kegiatan</th>
                <th class=" py-1 px-1 text-center">Harga</th>
                <th class=" py-1 px-1 text-center">Uang Bayar</th>
                <th class=" py-1 px-1 text-center">Sisa Bayar</th>
            </tr>
            <?php
            $no = 1; ?>
            <tr>
                <td class="text-center"><?= $no; ?></td>
                <td><?= $jenis_keb ?></td>
                <td class=" py-1 px-1 text-center"><?= $harga ?></td>
                <td class=" py-1 px-1 text-center"><?= $uang_bayar ?></td>
                <td class=" py-1 px-1 text-center"><?= $sisa_bayar ?></td>

            </tr>
        </table>
        <hr>
        <label for="" class="mt-2">Operator  : <?= $nama_operator ?></label><br>
    </div>
</body>

</html>