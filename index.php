<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 1 Depok</title>
    <style>
        .hero{
           background-image: none;
           background-position: center;
           background-image: url(bg.jpg);
           background-size: cover;
           background-repeat: no-repeat;
           width: 100%;
           height: 100vh;
        }
    </style>
    <link rel="icon" href="./logo.png">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="hero align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center" style="margin-top: 300px;">
                    <h3 class="text-white fw-bold text-center">Halo, Selamat Datang di SMKN 1 Depok</h3>
                <p class="text-white fw-bold text-center">Silakan login untuk masuk ke dalam sistem !</p>
                <a href="form/formlogin.php" class="btn btn-light rounded-5 mr-4 ml-4 me-2">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>