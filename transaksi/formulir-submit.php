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

// Required
$order_id = rand();
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => 94000, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => '1',
    'price' => $_POST['nominal'],
    'quantity' => 1,
    'name' => "Pembayaran " . $_SESSION['nama']
);

// Optional
// $item2_details = array(
//     'id' => 'a2',
//     'price' => 20000,
//     'quantity' => 2,
//     'name' => "Orange"
// );

// Optional
$item_details = array($item1_details);

// Optional
$billing_address = array(
    'first_name'    => $_SESSION['nama'],
    'last_name'     => "",
    'address'       => "",
    'city'          => "",
    'postal_code'   => "",
    'phone'         => "",
    'country_code'  => 'IDN'
);

// Optional
// $shipping_address = array(
//     'first_name'    => "Obet",
//     'last_name'     => "Supriadi",
//     'address'       => "Manggis 90",
//     'city'          => "Jakarta",
//     'postal_code'   => "16601",
//     'phone'         => "08113366345",
//     'country_code'  => 'IDN'
// );

// Optional
$customer_details = array(
    'first_name'    => $_SESSION['nama'],
    'last_name'     => "",
    'email'         => "wali@gmail.com",
    'phone'         => "",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
// $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

// Fill transaction details
$transaction = array(
    // 'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);

    $sql = ("SELECT *, (SELECT NamaKmr FROM tb_kamar WHERE KodeKmr = tb_santri.KodeKmr) AS kamar FROM tb_santri WHERE NIS = '".$_SESSION['id']."'") or die(mysql_error());
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    $id_penitipan = rand(100,999);
    $nis = $_SESSION['id'];
    $nama = str_replace('Wali ', '', $_SESSION['nama']);
    $KodeKmr = $result['kamar'];
    $nominal = htmlentities(trim($_POST['nominal']));
    $tgl_penitipan = date('Y-m-d');


    $sql = ("INSERT INTO tb_penitipan VALUES ('$id_penitipan', '$nis', '$nama', '$KodeKmr', '$nominal', '$tgl_penitipan', 'transfer', 'pending', '$snap_token', '$order_id')") or die(mysql_error());
    $result = mysqli_query($conn, $sql);

    header("location: checkout.php?id=".$id_penitipan."");

}catch (\Exception $e) {
    echo $e->getMessage();
}
