<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Sekolah</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Data Kegiatan</a>
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
                    <h3 class="text-white fw-bold text-center">Selamat Datang Operator SMKN 1 Depok !</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div id="transaksi">
            <h3 class="text-center mt-5">Laporan Keuangan</h3>
            <a href="../form/formtransaksi.php" class="btn btn-success mb-3 mt-2">Tambah Data</a>
            <div class="container d-flex mb-2">
                <form action="../struk/tanggal.php" method="get" >
                    <label for="">Tanggal Awal</label>
                    <input type="datetime-local" name="tanggal_awal" id="tanggal_awal" >
                    <label for="">Tanggal Akhir</label>
                    <input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir" >
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
            <div class="table-responsive">
            <table class="table-bordered container" id="dataTable" cellspacing="0">
                <tr>
                    <th class="py-1 px-2">No</th>
                    <th class="py-1 px-2 text-center mr-2 ml-2">Nomor Transaksi</th>
                    <th class="py-1 px-2 text-center">Operator</th>
                    <th class="py-1 px-2 text-center">Siswa</th>
                    <th class="py-1 px-2 text-center">NIS Siswa</th>
                    <th class=" py-1 px-1 text-center">Kegiatan</th>
                    <th class=" py-1 px-1 text-center">Tempat dan Waktu Transaksi</th>
                    <th class=" py-1 px-1 text-center">Uang Bayar</th>
                    <th class=" py-1 px-1 text-center">Sisa Bayar</th>
                    <th class=" py-1 px-1 text-center">Aksi</th>
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
                            <td class="text-center px-1"><?= $no; ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['no_transaksi'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['nama_operator'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['nama'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['nis_siswa'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['jenis_keb'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['tempat'] ?>,<?= $rows['tanggal_waktu'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['uang_bayar'] ?></td>
                            <td class="py-1 px-2 text-center mr-2 ml-2"><?= $rows['sisa_bayar'] ?></td>
                            <td class="d-flex mt-2 mb-2 py-1 px-2 text-center mr-2 ml-2">
                                <a href="../form/formtransaksi.php?id_transaksi=<?= $rows['id_transaksi'] ?>" class="btn btn-success mx-1">Edit</a>
                                <a href="../struk/perid.php?id_transaksi=<?= $rows['id_transaksi'] ?>" class="btn btn-primary mx-1">Cetak</a>
                                <a href="../action.php?id_transaksi=<?= $rows['id_transaksi'] ?>&action=delete_transaksi'" class="btn btn-danger">Hapus </a>
                            </td>
                        </tr>

                <?php $no++;
                    }
                }
                ?>
            </table>
            </div>
        </div>
        <div id="kegiatan">
            <h3 class="text-center mt-5">Data Kegiatan</h3>
            <a href="../form/formkegiatan.php" class="btn btn-success mb-2">Tambah Data Kegiatan</a>
            <table class="table-bordered container">
                <tr>
                    <th class="py-1 px-2 text-center">No</th>
                    <th class="py-1 px-2 text-center">Nama Kegiatan</th>
                    <th class="py-1 px-2 text-center">Nominal Biaya</th>
                    <th class="py-1 px-2 text-center">Deskripsi</th>
                </tr>
                <?php
                $no = 1;
                foreach (getKegiatan() as $rows) { ?>
                    <tr class="py-1 px-2">
                        <td class="py-1 px-2 text-center mr-2 ml-2"><?= $no; ?></td>
                        <td><?= $rows['jenis_keb'] ?></td>
                        <td class="py-1 px-2 text-center"><?= $rows['harga'] ?></td>
                        <td><?= $rows['deskripsi'] ?></td>
                    </tr>

                <?php $no++;
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>