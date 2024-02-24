<?php
function conn(){
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "nova_pembayaransekolah";
    $conn = mysqli_connect($server,$user,$pass,$dbname);
    if(!$conn){
        die("Koneksi Eror".mysqli_connect_error());
    }
    return $conn;
}
function getSiswa(){
    $conn = conn();
    $sql = "SELECT * FROM siswa";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}
function getKegiatan()
{
    $conn = conn();
    $sql = "SELECT * FROM kegiatan";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function getTransaksi()
{
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, transaksi.no_transaksi,  transaksi.tanggal_waktu, transaksi.tempat, transaksi.uang_bayar, transaksi.sisa_bayar, siswa.id_siswa, siswa.nis_siswa, siswa.nama, siswa.kelas, operator.id_operator, operator.nama_operator, kegiatan.id_keb, kegiatan.jenis_keb FROM siswa INNER JOIN transaksi ON siswa.id_siswa=transaksi.id_siswa INNER JOIN operator ON operator.id_operator = transaksi.id_operator INNER JOIN kegiatan ON kegiatan.id_keb = transaksi.id_keb ORDER BY id_transaksi";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function getOperator(){
    $conn = conn();
    $sql = "SELECT * FROM operator";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function getsiswabyid($id_siswa){
    $conn = conn();
    $sql = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function gettransaksibyid($id_transaksi)
{
    $conn = conn();
    $sql = "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function cetaltransaksi($id_transaksi){
    $conn = conn();
    $sql = "SELECT  transaksi.id_transaksi, transaksi.no_transaksi,  transaksi.tanggal_waktu, transaksi.tempat, transaksi.uang_bayar, transaksi.sisa_bayar, siswa.id_siswa, siswa.nis_siswa, siswa.nama, siswa.kelas, operator.id_operator, operator.nama_operator, kegiatan.id_keb, kegiatan.jenis_keb, kegiatan.harga FROM siswa INNER JOIN transaksi ON siswa.id_siswa=transaksi.id_siswa INNER JOIN operator ON operator.id_operator = transaksi.id_operator INNER JOIN kegiatan ON kegiatan.id_keb = transaksi.id_keb WHERE id_transaksi='$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function getoperatorbyid($id_operator){
    $conn = conn();
    $sql = "SELECT * FROM operator WHERE id_operator='$id_operator'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function getkegiatanbyid($id_keb)
{
    $conn = conn();
    $sql = "SELECT * FROM kegiatan WHERE id_keb='$id_keb'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function insertSiswa($nis_siswa,$nama,$kelas,$jenis_kelamin){
    $conn = conn();
    $sql = "INSERT INTO siswa VALUES ('','$nis_siswa', '$nama' , '$kelas','$jenis_kelamin')";
    $result = mysqli_query($conn, $sql);
    return $result;
 }
function updateSiswa($id_siswa,$nis_siswa, $nama, $kelas, $jenis_kelamin)
{
    $conn = conn();
    $sql = "UPDATE siswa SET nis_siswa='$nis_siswa', nama='$nama', kelas='$kelas', jenis_kelamin='$jenis_kelamin' WHERE id_siswa='$id_siswa'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function deleteSiswa($id_siswa)
{
    $conn = conn();
    $sql = "DELETE FROM siswa WHERE id_siswa='$id_siswa'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function insertOperator($nip_operator, $jenis_kelamin, $nama_operator)
{
    $conn = conn();
    $sql = "INSERT INTO operator VALUES ('','$nip_operator', '$jenis_kelamin' ,'$nama_operator')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function updateOperator($id_operator, $nip_operator, $jenis_kelamin,$nama_operator)
{
    $conn = conn();
    $sql = "UPDATE operator SET nip_operator='$nip_operator', jenis_kelamin='$jenis_kelamin', nama_operator='$nama_operator' WHERE id_operator='$id_operator'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function deleteOperator($id_operator)
{
    $conn = conn();
    $sql = "DELETE FROM operator WHERE id_operator='$id_operator'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function fetchSiswa(){
    $conn = conn();
    $sql = "SELECT id_siswa,nama FROM siswa";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}
function fetchOperator()
{
    $conn = conn();
    $sql = "SELECT id_operator,nama_operator FROM operator";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}
function fetchKegiatan()
{
    $conn = conn();
    $sql = "SELECT id_keb,jenis_keb,harga FROM kegiatan";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}
function getHargaKeb($id_keb){
    $conn = conn();
    $sql = "SELECT harga FROM kegiatan WHERE id_keb='$id_keb'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}
function insertTransaksi($id_keb, $no_transaksi, $id_siswa, $id_operator,$tanggal_waktu,$tempat,$uang_bayar,$sisa_bayar)
{
    $conn = conn();
    $sql = "INSERT INTO transaksi VALUES ('','$id_keb','$no_transaksi','$id_siswa','$id_operator','$tanggal_waktu','$tempat','$uang_bayar','$sisa_bayar')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function updateTransaksi($id_transaksi,$id_keb, $no_transaksi, $id_siswa, $id_operator, $tanggal_waktu, $tempat, $uang_bayar, $sisa_bayar)
{
    $conn = conn();
    $sql = "UPDATE transaksi SET id_keb='$id_keb',no_transaksi='$no_transaksi',id_siswa='$id_siswa',id_operator='$id_operator',tanggal_waktu='$tanggal_waktu',tempat='$tempat',uang_bayar='$uang_bayar',sisa_bayar='$sisa_bayar' WHERE id_transaksi='$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function deleteTransaksi($id_transaksi)
{
    $conn = conn();
    $sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function getusernamebyusername($username){
     $conn = conn();
    $sql = "SELECT * FROM tb_login WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    return $rows;
}
function insertKegiatan($jenis_keb, $harga,$deskripsi)
{
    $conn = conn();
    $sql = "INSERT INTO kegiatan VALUES ('','$jenis_keb', '$harga','$deskripsi')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function updateKegiatan($id_keb, $jenis_keb, $harga, $deskripsi)
{
    $conn = conn();
    $sql = "UPDATE kegiatan SET jenis_keb='$jenis_keb', harga='$harga',deskripsi='$deskripsi' WHERE id_keb='$id_keb'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function insertUser($username, $password, $level)
{
    $conn = conn();
    $sql = "INSERT INTO tb_login VALUES ('','$username', '$password','$level')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function deleteKegiatan($id_keb)
{
    $conn = conn();
    $sql = "DELETE FROM kegiatan WHERE id_keb='$id_keb'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function struktanggal($tanggal_awal, $tanggal_akhir){
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, transaksi.no_transaksi,  transaksi.tanggal_waktu, transaksi.tempat, transaksi.uang_bayar, transaksi.sisa_bayar, siswa.id_siswa, siswa.nis_siswa, siswa.nama, siswa.kelas, operator.id_operator, operator.nama_operator, kegiatan.id_keb, kegiatan.jenis_keb FROM siswa INNER JOIN transaksi ON siswa.id_siswa=transaksi.id_siswa INNER JOIN operator ON operator.id_operator = transaksi.id_operator INNER JOIN kegiatan ON kegiatan.id_keb = transaksi.id_keb WHERE transaksi.tanggal_waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id_transaksi";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function strukperanak($id_transaksi)
{
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, transaksi.no_transaksi,  transaksi.tanggal_waktu, transaksi.tempat, transaksi.uang_bayar, transaksi.sisa_bayar, siswa.id_siswa, siswa.nis_siswa, siswa.nama, siswa.kelas, operator.id_operator, operator.nama_operator, kegiatan.id_keb, kegiatan.jenis_keb FROM siswa INNER JOIN transaksi ON siswa.id_siswa=transaksi.id_siswa INNER JOIN operator ON operator.id_operator = transaksi.id_operator INNER JOIN kegiatan ON kegiatan.id_keb = transaksi.id_keb WHERE transaksi.id_transaksi = '$id_transaksi' ORDER BY transaksi.id_transaksi";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function cariTransaksi()
{
    $conn = conn();
    $pencarian = $_GET['cari_transaksi'];
    $sql = "SELECT transaksi.id_transaksi, transaksi.no_transaksi,  transaksi.tanggal_waktu, transaksi.tempat, transaksi.uang_bayar, transaksi.sisa_bayar, siswa.id_siswa, siswa.nis_siswa, siswa.nama, siswa.kelas, operator.id_operator, operator.nama_operator, kegiatan.id_keb, kegiatan.jenis_keb FROM siswa INNER JOIN transaksi ON siswa.id_siswa=transaksi.id_siswa INNER JOIN operator ON operator.id_operator = transaksi.id_operator INNER JOIN kegiatan ON kegiatan.id_keb = transaksi.id_keb WHERE operator.nama_operator LIKE '%" . $pencarian . "%' OR siswa.nama LIKE '%" . $pencarian . "%' OR siswa.kelas LIKE '%" . $pencarian . "%'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>