<?php
require "../db.php";

$id_transaksi = $_GET['id_transaksi'] ?? 0;

if ($id_transaksi > 0) {
    $row = gettransaksibyid($id_transaksi);
    $id_transaksi = $row['id_transaksi'];
    $id_keb = $row['id_keb'];
    $no_transaksi = $row['no_transaksi'];
    $id_siswa = $row['id_siswa'];
    $id_operator = $row['id_operator'];
    $tempat = $row['tempat'];
    $uang_bayar = $row['uang_bayar'];

    $form_action = "../action.php?action=update_transaksi";
    $tittle = "Edit Data Transaksi";
} else {
    $id_transaksi = '';
    $id_keb = '';
    $jenis_keb = '';
    $no_transaksi = '';
    $id_siswa = '';
    $nama = '';
    $id_operator = '';
    $nama_operator = '';
    $tempat = '';
    $uang_bayar = '';

    $form_action = "../action.php?action=insert_transaksi";
    $tittle = "Tambah Data Transaksi";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Form Transaksi</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><?= $tittle ?></h2>
        <form action="<?= $form_action ?>" method="post" class="container">
            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi ?>">
            <label for="">Jenis Kegiatan</label>
            <select name="id_keb" id="jenis_keb" class="form-control mb-3">
                <option disabled selected>Pilih jenis kegiatan yang akan dibayar..</option>
                <?php foreach (fetchKegiatan() as $options) {
                    $selected = $options['id_keb'] == $id_keb ? 'selected' : '';
                ?>
                    <option value="<?= $options['id_keb'] ?>?" <?= $selected ?>>
                        <?= $options['jenis_keb'] ?> Rp <?= $options['harga'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="">Nomer Transaksi</label>
            <input type="number" name="no_transaksi" id="no_transaksi" value="<?= $no_transaksi ?>" class="form-control mb-3">
            <label for="">Nama Siswa</label>
            <select name="id_siswa" id="nama" class="form-control mb-3">
                <option disabled selected>Pilih nama siswa..</option>
                <?php foreach (fetchSiswa() as $options) {
                    $selected = $options['id_siswa'] == $id_siswa ? 'selected' : '';
                ?>
                    <option value="<?= $options['id_siswa'] ?>?" <?= $selected ?>>
                        <?= $options['nama'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="">Nama Operator</label>
            <select name="id_operator" id="nama_operator" class="form-control mb-3">
                <option disabled selected>Pilih nama operator..</option>
                <?php foreach (fetchOperator() as $options) {
                    $selected = $options['id_operator'] == $id_operator ? 'selected' : '';
                ?>
                    <option value="<?= $options['id_operator'] ?>?" <?= $selected ?>>
                        <?= $options['nama_operator'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="">Tempat Transaksi</label>
            <input type="text" name="tempat" value="<?= $tempat ?>" class="form-control mb-3">
            <label for="">Nominal Uang Bayar</label>
            <input type="number" name="uang_bayar" value="<?= $uang_bayar ?>" class="form-control mb-3">
            <button type="submit" class="container btn btn-success mt-2">Kirim</button>
        </form>
    </div>
</body>

</html>