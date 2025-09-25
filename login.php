<?php
include "all_lib.php";

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login - <?php echo nama(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="assets_login/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets_login/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets_login/fonts/flaticon/font/flaticon.css">

    <link rel="shortcut icon" href="assets/img/DU logo.png" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
    <link type="text/css" rel="stylesheet" href="assets_login/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets_login/css/skins/default.css">

</head>

<body id="top">

    <div class="login-11">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-12 col-pad-0 bg-color-11">
                    <div class="form-section">
                        <div class="logo">
                            <a href="#">
                                <img src="assets/img/DU logo.png" alt="logo">
                            </a>
                        </div>
                        <h3>Silahkan Login Disini</h3>
                        <div class="login-inner-form">
                            <form action="ceklogin.php" method="POST">
                                <div class="form-group clearfix">
                                    <label>Username</label>
                                    <div class="form-box">
                                        <input type="text" name="username" placeholder="Username" class="input-text">
                                        <i class="flaticon-mail-2"></i>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label>Password</label>
                                    <div class="form-box">
                                        <input type="password" name="password" placeholder="******" class="input-text">
                                        <i class="flaticon-password"></i>
                                    </div>
                                </div>
                                <div class="checkbox clearfix">
                                    <div class="form-check checkbox-theme">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">Login</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-12 col-pad-0 bg-img none-992">
                    <div class="info">
                        <h1>Selamat Datang</h1>
                        <p>Di Sistem Informasi Monitoring Kartu Keuangan Santri Hamalatul Qura'n Jombang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets_login/js/jquery-2.2.0.min.js"></script>
    <script src="assets_login/js/popper.min.js"></script>
    <script src="assets_login/js/bootstrap.min.js"></script>

</body>

</html>