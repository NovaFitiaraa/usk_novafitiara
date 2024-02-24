<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala Sekolah</title>
    <style>
        .hero{
           background-image: none;
           background-position: center;
           background-image: url(../bg.jpg);
           background-size: cover;
           background-repeat: no-repeat;
           width: 100%;
           height: 100vh;
        }
    </style>
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="operator.php">SMKN 1 Depok</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#transaksi">Data Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="../action.php?action=logout" class="text-decoration-none text-white">Logout</a></button>
                </form>
            </div>
      </div>
    </nav>
    
    <div class="container-fluid" id="home">
        <div class="row">
            <div class="hero align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center" style="margin-top: 300px;">
                    <h3 class="text-white fw-bold text-center">Selamat Datang Kepala Sekolah SMKN 1 Depok !</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>
    <div class="container">
        <div id="transaksi">
            <h3 class="text-center mt-5">Laporan Keuangan</h3>
            <a href="../form/formtransaksi.php" class="btn btn-success mb-3 mt-2">Tambah Data</a>
            <div class="container d-flex">
                <form action="../struk/tanggal.php" method="get">
                    <label for="">Tanggal Awal</label>
                    <input type="datetime-local" name="tanggal_awal" id="tanggal_awal">
                    <label for="">Tanggal Akhir</label>
                    <input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir">
                    <button type="submit" class="btn btn-primary">Cetak Data</button>
                </form>
                <form action="" method="get" class="mx-auto">
                    <label for="">Cari :</label>
                    <input type="text" name="cari_transaksi" id="cari_transaksi" value="<?php if (isset($_GET['cari_transaksi'])) {
                                                                                            echo $_GET['cari_transaksi'];
                                                                                        } ?>">
                    <button type="submit" class="btn btn-primary">Cari Data</button>
                </form>
            </div>
            <table class="table-bordered container">
                <tr>
                    <th class="py-1 px-2">No</th>
                    <th class="py-1 px-2 text-center">Nomor Transaksi</th>
                    <th class="py-1 px-2 text-center">Operator</th>
                    <th class="py-1 px-2 text-center">Siswa</th>
                    <th class="py-1 px-2 text-center">NIS Siswa</th>
                    <th class=" py-1 px-1 text-center">Kegiatan</th>
                    <th class=" py-1 px-1 text-center">Tempat dan Waktu Transaksi</th>
                    <th class=" py-1 px-1 text-center">Uang Bayar</th>
                    <th class=" py-1 px-1 text-center">Sisa Bayar</th>
                </tr>
                <?php
                $no = 1;
                if (isset($_GET['cari_transaksi'])) {
                    $cari = cariTransaksi();
                } else {
                    $cari = getTransaksi();
                }
                if ($cari !== false) {
                    foreach ($cari as $rows) { ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
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
                }
                ?>
            </table>
        </div>
        </div>
    </div>
</body>

</html>