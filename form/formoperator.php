<?php
require "../db.php";

$id_operator = $_GET['id_operator'] ?? 0;

if ($id_operator > 0) {
    $row = getoperatorbyid($id_operator);
    $id_operator = $row['id_operator'];
    $nip_operator = $row['nip_operator'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $nama_operator = $row['nama_operator'];

    $form_action = "../action.php?action=update_operator";
    $tittle = "Edit Data Operator";
} else {
    $id_operator = '';
    $nip_operator = '';
    $jenis_kelamin = '';
    $nama_operator = '';

    $form_action = "../action.php?action=insert_operator";
    $tittle = "Tambah Data Operator";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Form Operator</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><?= $tittle ?></h2>
        <form action="<?= $form_action ?>" method="post">
            <input type="hidden" name="id_operator" id="id_operator" value="<?= $id_operator ?>">
            <label for="">NIP Operator</label>
            <input type="number" name="nip_operator" id="nip_operator" value="<?= $nip_operator ?>" class="form-control mb-3">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" value="<?= $jenis_kelamin ?>" class="form-control mb-3">
                <option value="perempuan">Perempuan</option>
                <option value="laki-laki">Laki-laki</option>
            </select>
            <label for="">Nama Operator</label>
            <input type="text" name="nama_operator" value="<?= $nama_operator ?>" class="form-control mb-3">
            <button type="submit" class="container mt-2 btn btn-primary">Kirim</button>
        </form>
    </div>
</body>

</html>