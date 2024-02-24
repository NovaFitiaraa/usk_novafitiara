<?php
require "../db.php";

$id_siswa = $_GET['id_siswa'] ?? 0;

if ($id_siswa > 0) {
    $row = getsiswabyid($id_siswa);
    $id_siswa = $row['id_siswa'];
    $nis_siswa = $row['nis_siswa'];
    $nama = $row['nama'];
    $kelas = $row['kelas'];
    $jenis_kelamin = $row['jenis_kelamin'];

    $form_action = "../action.php?action=update_siswa";
    $tittle = "Edit Data Siswa";
} else {
    $id_siswa = '';
    $nis_siswa = '';
    $nama = '';
    $kelas = '';
    $jenis_kelamin = '';

    $form_action = "../action.php?action=insert_siswa";
    $tittle = "Tambah Data Siswa";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Form Siswa</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-5"><?= $tittle ?></h2>
        <form action="<?= $form_action ?>" method="post">
            <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $id_siswa ?>">
            <label for="">NIS Siswa</label>
            <input type="number" name="nis_siswa" id="nis_siswa" value="<?= $nis_siswa ?>" class="form-control mb-3">
            <label for="">Nama Siswa</label>
            <input type="text" name="nama" value="<?= $nama ?>" class="form-control mb-3">
            <label for="">Kelas Siswa</label>
            <input type="text" name="kelas" value="<?= $kelas ?>" class="form-control mb-3">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" value="<?= $jenis_kelamin ?>" class="form-control mb-3">
                <option value="perempuan">Perempuan</option>
                <option value="laki-laki">Laki-laki</option>
            </select>
            <button type="submit" class="container mt-2 btn btn-primary">Kirim</button>
        </form>
    </div>
</body>

</html>