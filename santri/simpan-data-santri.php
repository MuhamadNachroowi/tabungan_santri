<?php
include '../lib/koneksi.php';
$NIS = htmlentities(trim($_POST['NIS']));
$NamaSantri = htmlentities(trim($_POST['NamaSantri']));
$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
$TempatLahir = htmlentities(trim($_POST['TempatLahir']));
$TanggalLahir = htmlentities(trim($_POST['TanggalLahir']));
$AlamatSantri = htmlentities(trim($_POST['AlamatSantri']));
$KodeKmr = htmlentities(trim($_POST['KodeKmr']));
$NoHpOrtu = htmlentities(trim($_POST['NoHpOrtu']));

$username = htmlentities(trim($_POST['username']));
$password = htmlentities(trim($_POST['password']));


$sql = ("INSERT INTO tb_santri (NIS, NamaSantri, JenisKelamin, TempatLahir, TanggalLahir, 
		AlamatSantri, KodeKmr, NoHpOrtu)VALUES ('$NIS', '$NamaSantri', '$JenisKelamin', '$TempatLahir', '$TanggalLahir', '$AlamatSantri', '$KodeKmr', '$NoHpOrtu')") or die(mysql_error());
$result = mysqli_query($conn, $sql);

$id_user = $NIS;
$username = $username;
$password = md5($password);
$level = 'Walisantri';

$sql2 = ("INSERT INTO tb_user (id_user, username, password, level)VALUES ('$id_user', '$username', '$password', '$level')") or die(mysql_error());
$result2 = mysqli_query($conn, $sql2);

$sql3 = ("INSERT INTO tb_walisantri (id_walisantri, nama_walisantri, jekel, alamat)VALUES ('$id_user', 'Wali $NamaSantri', '$JenisKelamin', '$AlamatSantri')") or die(mysql_error());
$result3 = mysqli_query($conn, $sql3);

header("location: data-santri.php");
