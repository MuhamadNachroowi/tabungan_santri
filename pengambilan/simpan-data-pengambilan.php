<?php
include '../lib/koneksi.php';
$id_pengambilan = htmlentities(trim($_POST['id_pengambilan']));
$nis = htmlentities(trim($_POST['nis']));
$nama = htmlentities(trim($_POST['nama']));
$KodeKmr = htmlentities(trim($_POST['kamar']));
$nominal = htmlentities(trim($_POST['nominal']));
$tgl_pengambilan = htmlentities(trim($_POST['tgl_pengambilan']));


$sql = ("INSERT INTO tb_pengambilan VALUES ('$id_pengambilan', '$nis', '$nama', '$KodeKmr', '$nominal', '$tgl_pengambilan')") or die(mysql_error());
$result = mysqli_query($conn, $sql);

header("location: lap-pengambilan.php");
