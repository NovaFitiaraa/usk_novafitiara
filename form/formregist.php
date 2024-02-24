<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Registrasi</h1>
        <form action="../action.php?action=regist" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-3">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-3">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control mb-3">
            <button type="submit" class="btn btn-success mb-2 mt-4 w-100 py-2">Daftar</button>
        </form>
    </div>
</body>

</html>