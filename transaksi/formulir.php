<?php
include "../all_lib.php";
include "../lib/koneksi.php";
session_start();
if ($_SESSION['StatusLogin'] == "OK") {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../assets/img/DU logo.png" />
        <title><?php echo nama(); ?></title>

        <!-- Bootstrap -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    </head>

    <body>
        <?php
        include '../menu.php';
        ?>
        <div class="container container-form">
            <div class="row">
                <div class="span12">
                    <form method="POST" action="formulir-submit.php">
                    <div class="input-group">
                        <legend>Masukkan Nominal</legend>
                        <div class="form-group">
                            <div class="input-group">
                                <label>Nominal</label>
                                <input type="number" name="nominal" class="form-control" id="nominal" required></input>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" name="submit" value="Lanjut ke Pembayaran">
                    <a href="../index.php" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <?php
        include '../footer.php';
        ?>
    </body>

    </html>

<?php
} else {
    header("location:../login.php");
}
?>