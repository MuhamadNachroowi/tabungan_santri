<?php
include '../lib/koneksi.php';
$NIP = htmlentities(trim($_POST['NIP']));
$NamaPembina = htmlentities(trim($_POST['NamaPembina']));
$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
$AlamatPembina = htmlentities(trim($_POST['AlamatPembina']));
$NoHp = htmlentities(trim($_POST['NoHp']));


$sql = ("INSERT INTO tb_pembina VALUES ('$NIP', '$NamaPembina', '$JenisKelamin', '$AlamatPembina', '$NoHp')") or die(mysql_error());

$pas = md5($_POST['password']);

$sql2 = ("INSERT INTO tb_user VALUES ('$NIP', '$_POST[username]', '$pas', 'Pembina')") or die(mysql_error());

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

header("location: data-pembina.php");
