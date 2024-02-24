<?php
require "db.php";

$aksi = $_GET['action'];

switch($aksi){
    case 'insert_siswa':
        $result= insertSiswa($_POST['nis_siswa'], $_POST['nama'], $_POST['kelas'], $_POST['jenis_kelamin']);
        if($result){
            $msg = "Tambah Data Siswa Berhasil";
            $loc = "dashboard/admin.php";
        }else{
            $msg = "Tambah Data Siswa Gagal";
            $loc = "form/formsiswa.php";
        }
    break;
    case 'update_siswa':
        $result = updateSiswa($_POST['id_siswa'],$_POST['nis_siswa'], $_POST['nama'], $_POST['kelas'], $_POST['jenis_kelamin']);
        if ($result) {
            $msg = "Update Data Siswa Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Update Data Siswa Gagal";
            $loc = "form/formsiswa.php";
        }
        break;
    case 'delete_siswa':
        $id_siswa = $_GET['id_siswa'];
        $result = deleteSiswa($id_siswa);
        if ($result) {
            $msg = "Hapus Data Siswa Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Hapus Data Siswa Gagal";
            $loc = "form/formsiswa.php";
        }
        break;
    case 'insert_operator':
        $result
        = insertOperator($_POST['nip_operator'], $_POST['jenis_kelamin'], $_POST['nama_operator']);
        if ($result) {
            $msg = "Tambah Data Operator Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Tambah Data Operator Gagal";
            $loc = "form/formsiswa.php";
        }
        break;
    case 'update_operator':
        $result = updateOperator($_POST['id_operator'], $_POST['nip_operator'], $_POST['jenis_kelamin'], $_POST['nama_operator']);
        if ($result) {
            $msg = "Update Data Operator Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Update Data Operator Gagal";
            $loc = "form/formOperator.php";
        }
        break;
    case 'delete_Operator':
        $id_operator = $_GET['id_operator'];
        $result = deleteOperator($id_operator);
        if ($result) {
            $msg = "Hapus Data Operator Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Hapus Data Operator Gagal";
            $loc = "form/formOperator.php";
        }
        break;
    case 'insert_kegiatan':
        $result
            = insertKegiatan($_POST['jenis_keb'], $_POST['harga'], $_POST['deskripsi']);
        if ($result) {
            $msg = "Tambah Data Kegiatan Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Tambah Data Kegiatan Gagal";
            $loc = "form/formkegiatan.php";
        }
        break;
    case 'update_kegiatan':
        $result = updateKegiatan($_POST['id_keb'],$_POST['jenis_keb'], $_POST['harga'], $_POST['deskripsi']);
        if ($result) {
            $msg = "Update Data Kegiatan Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Update Data Operator Gagal";
            $loc = "form/formkegiatan.php";
        }
        break;
    case 'delete_kegiatan':
        $id_keb = $_GET['id_keb'];
        $result = deleteKegiatan($id_keb);
        if ($result) {
            $msg = "Hapus Data Kegiatan Berhasil";
            $loc = "dashboard/admin.php";
        } else {
            $msg = "Hapus Data Kegiatan Gagal";
            $loc = "form/formkegiatan.php";
        }
        break;
        case 'logout':
            session_unset();
            session_destroy();
            $msg = "Anda berhasil logout";
            $loc = "index.php";
        break;
    case 'login':
        $user = getusernamebyusername($_POST['username']);
        $postedLevel = $_POST['level'];
        $password = $_POST['password'];

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['level'] = $user['level'];

            if ($user['level'] === 'operator' && $postedLevel === "1") {
                $msg = "Selamat Datang Operator";
                $loc = "dashboard/operator.php";
            } else if ($user['level'] === 'admin' && $postedLevel === "2") {
                $msg = "Selamat Datang Admin";
                $loc = "dashboard/admin.php";
            } else if ($user['level'] === 'kepala_sekolah' && $postedLevel === "3") {
                $msg = "Selamat Datang Kepala Sekolah";
                $loc = "dashboard/kepsek.php";
            } else {
                $msg = "Gagal Login";
                $loc = "dashboard/operator.php";
            }
        } else {
            $msg = "Username dan Password tidak ditemukan";
            $loc = "form/formlogin.php";
        }
        break;
    case 'insert_transaksi':
        $id_keb = $_POST['id_keb'];
        $row = getHargaKeb($id_keb);
        $harga = $row['harga'];
        $uang_bayar = $_POST['uang_bayar'];
        $sisa_bayar = $harga-$uang_bayar;
        $tanggal_waktu=$_POST['tanggal_waktu'];
        $tanggal_waktu = date('o:m:d H:i:s');
        $result
            = insertTransaksi($_POST['id_keb'], $_POST['no_transaksi'], $_POST['id_siswa'], $_POST['id_operator'], $tanggal_waktu, $_POST['tempat'], $uang_bayar, $sisa_bayar);
        if ($result) {
            $msg = "Tambah Data Transaksi Berhasil";
            $loc = "dashboard/operator.php";
        } else {
            $msg = "Tambah Data Transaksi Gagal";
            $loc = "form/formtransaksi.php";
        }
        break;
    case 'update_transaksi':
        $id_keb = $_POST['id_keb'];
        $row = getHargaKeb($id_keb);
        $harga = $row['harga'];
        $uang_bayar = $_POST['uang_bayar'];
        $sisa_bayar = $harga - $uang_bayar;
        $tanggal_waktu = $_POST['tanggal_waktu'];
        $tanggal_waktu = date('o:m:d H:i:s');
        $result
            = updateTransaksi($_POST['id_transaksi'],$_POST['id_keb'], $_POST['no_transaksi'], $_POST['id_siswa'], $_POST['id_operator'], $tanggal_waktu, $_POST['tempat'], $uang_bayar, $sisa_bayar);
        if ($result) {
            $msg = "Update Data Transaksi Berhasil";
            $loc = "dashboard/operator.php";
        } else {
            $msg = "Update Data Transaksi Gagal";
            $loc = "form/formtransaksi.php";
        }
        break;
    case 'delete_transaksi':
        $id_transaksi = $_GET['id_transaksi'];
        $result = deleteTransaksi($id_transaksi);
        if ($result) {
            $msg = "Hapus Data Transaksi Berhasil";
            $loc = "dashboard/operator.php";
        } else {
            $msg = "Hapus Data Transaksi Gagal";
            $loc = "dashboard/operator.php";
        }
        break;
        case 'regist':
        $user = getusernamebyusername($username);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        $level = $_POST['level'];
        if($user){
            $msg = "Username dan Password sudah terdaftar";
            $loc = "form/formregist.php";
        }else if($password != $repeat_password){
            $msg = "Username dan Password tidak sesuai";
            $loc = "form/formregist.php";
        }else {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $result = insertUser($username, $password, 'operator');
            if ($result) {
                $msg = "Registrasi berhasil";
                $loc = "dashboard/admin.php";
            } else {
                $msg = "Registrasi Gagal";
                $loc = "form/formkegiatan.php";
            }
        }
            break;

 }
 if(!empty($msg)){
    echo "<script>
    alert('$msg');
    location.href = '$loc';
    </script>";
 }
?>