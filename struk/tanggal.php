<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Struk Tanggal</title>
</head>

<body>
    <h1 class="mt-5 text-center">Laporan Keuangan berdasarkan tanggal</h1>
    <table class="mt-4 table-bordered container">
        <tr>
            <th>No</th>
            <th>Nomor Transaksi</th>
            <th>Operator</th>
            <th>Siswa</th>
            <th>NIS Siswa</th>
            <th>Kegiatan</th>
            <th>Tempat dan Waktu Transaksi</th>
            <th>Uang Bayar</th>
            <th>Sisa Bayar</th>
        </tr>
        <?php
        $no = 1;
        $tanggal_awal = $_GET['tanggal_awal'];
        $tanggal_akhir = $_GET['tanggal_akhir'];
        foreach (struktanggal($tanggal_awal, $tanggal_akhir) as $rows) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $rows['no_transaksi'] ?></td>
                <td><?= $rows['nama_operator'] ?></td>
                <td><?= $rows['nama'] ?></td>
                <td><?= $rows['nis_siswa'] ?></td>
                <td><?= $rows['jenis_keb'] ?></td>
                <td><?= $rows['tempat'] ?>,<?= $rows['tanggal_waktu'] ?></td>
                <td><?= $rows['uang_bayar'] ?></td>
                <td><?= $rows['sisa_bayar'] ?></td>
            </tr>

        <?php $no++;
        }
        ?>
    </table>

</body>

</html>