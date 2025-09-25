<?php
include '../lib/koneksi.php';
$id_penitipan = htmlentities(trim($_POST['id_penitipan']));
$nis = htmlentities(trim($_POST['nis']));
$nama = htmlentities(trim($_POST['nama']));
$KodeKmr = htmlentities(trim($_POST['kamar']));
$nominal = htmlentities(trim($_POST['nominal']));
$tgl_penitipan = htmlentities(trim($_POST['tgl_penitipan']));


$sql = ("INSERT INTO tb_penitipan VALUES ('$id_penitipan', '$nis', '$nama', '$KodeKmr', '$nominal', '$tgl_penitipan', 'tunai', 'success')") or die(mysql_error());
$result = mysqli_query($conn, $sql);

header("location: lap-penitipan.php");
