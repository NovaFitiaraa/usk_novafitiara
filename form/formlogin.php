<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container align-item-center">
        <h1 class="text-center mt-5 mb-5">Login</h1>
        <form action="../action.php?action=login" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-3">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-3">
            <label for="">Level</label>
            <select name="level" class="form-control mb-3">
                <option value="1" name="operator">Operator</option>
                <option value="2" name="admin">Admin</option>
                <option value="3" name="kepala_sekolah">Kepala Sekolah</option>
            </select>
            <button type="submit" class="btn btn-success mb-2 mt-4 w-100 py-2">Login</button>
        </form>
    </div>
    </div>
</body>

</html>