<?php
require "../db.php";

$id_keb = $_GET['id_keb'] ?? 0;

if ($id_keb > 0) {
    $row = getkegiatanbyid($id_keb);
    $id_keb = $row['id_keb'];
    $jenis_keb = $row['jenis_keb'];
    $harga = $row['harga'];
    $deskripsi = $row['deskripsi'];

    $form_action = "../action.php?action=update_kegiatan";
    $tittle = "Edit Data Kegiatan";
} else {
    $id_keb = '';
    $jenis_keb = '';
    $harga = '';
    $deskripsi = '';

    $form_action = "../action.php?action=insert_kegiatan";
    $tittle = "Tambah Data Kegiatan";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Form Kegiatan</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><?= $tittle ?></h2>
        <form action="<?= $form_action ?>" method="post">
            <input type="hidden" name="id_keb" id="id_keb" value="<?= $id_keb ?>">
            <label for="">Jenis Kegiatan</label>
            <input type="text" name="jenis_keb" id="jenis_keb" value="<?= $jenis_keb ?>" class="form-control mb-3">
            <label for="">Nominal Kegiatan</label>
            <input type="text" name="harga" value="<?= $harga ?>" class="form-control mb-3">
            <label for="">Deskripsi Kegiatan</label>
            <input type="text" name="deskripsi" value="<?= $deskripsi ?>"class="form-control mb-3">
            <button type="submit" class="container btn btn-primary mt-2">Kirim</button>
        </form>
    </div>
</body>

</html>