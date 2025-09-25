<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../assets/midtrans/Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-yydSVRCiZoPuyebnkjxQLjV1';
Config::$clientKey = 'SB-Mid-client-Z0bGFnJ5LN7FlYeY';

// non-relevant function only used for demo/example purpose
// printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;


include "../all_lib.php";
include "../lib/koneksi.php";
session_start();

$sql = ("SELECT * FROM tb_penitipan WHERE id_penitipan = '" . $_GET['id'] . "'") or die(mysql_error());
$result = mysqli_fetch_array(mysqli_query($conn, $sql));

// echo $status_transaksi = Transaction::status($result['order_id'])->transaction_status;

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
                <div class="col-12">
                    <?php if(isset($_GET['message'])): ?>
                    <div class="alert alert-danger">Belum ada pembayaran</div>
                    <?php endif; ?>
                </div>
                <div class="span12">
                    <div class="input-group">
                        <legend>Lanjutkan Pembayaran</legend>
                        <div class="form-group">
                            <div class="input-group">
                                <small>Total Tagihan</small>
                                <h2><?php echo number_format($result['nominal'], 0, ',', '.'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <?php if ($result['status'] == 'pending') : ?>
                        <button id="pay-button" class="btn btn-primary">Bayar</button><br>
                        Sudah Bayar ? <a href="cek-status.php?id=<?php echo $result['id_penitipan']; ?>">Cek Status Pembayaran</a>
                    <?php else: ?>
                    <span class="alert alert-success">Sudah terbayar</span>
                    <?php endif; ?>
                    <!-- <p id="result-json"></p> -->
                    <br>
                    <br>
                    <br>
                    <p>Simulasi Pembayaran <a href="https://simulator.sandbox.midtrans.com/assets/index.html" target="_blank">Klik Disini</a></p>
                </div>
            </div>
        </div>
        </div>

        <?php
        include '../footer.php';
        ?>

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay('<?php echo $result['snap_token']; ?>', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        // document.getElementById('result-json').innerHTML += result.transaction_status;
                        // console(result.transaction_status)
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        // document.getElementById('result-json').innerHTML += result.transaction_status;
                        // if (result.transaction_status == 'setlem')
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    </body>

    </html>

<?php
} else {
    header("location:../login.php");
}
?>