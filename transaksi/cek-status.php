<?php


// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview


namespace Midtrans;


include "../all_lib.php";
include "../lib/koneksi.php";
session_start();

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

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";

$id_penitipan = $_GET['id'];

$sql = ("SELECT * FROM tb_penitipan WHERE id_penitipan = '".$_GET['id']."'") or die(mysql_error());
$result = mysqli_fetch_array(mysqli_query($conn, $sql));

try {

    $status_transaksi = Transaction::status($result['order_id'])->transaction_status;

    if($status_transaksi == 'pending'){
        $status_transaksi = 'pending';
    }
    
    if($status_transaksi == 'settlement'){
        $status_transaksi = 'success';
    }
    
    
    $sql = ("UPDATE tb_penitipan SET status = '$status_transaksi'") or die(mysql_error());
    $result = mysqli_query($conn, $sql);
    
    if($status_transaksi == 'pending'){
        header("location: checkout.php?id=".$id_penitipan. "&message=error");
    }else{
        header("location: checkout.php?id=".$id_penitipan."");
    }
    
}catch (\Exception $e) {
    header("location: checkout.php?id=".$id_penitipan."&message=error");
}
