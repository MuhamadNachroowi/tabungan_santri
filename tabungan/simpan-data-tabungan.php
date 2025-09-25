<?php
	include '../lib/koneksi.php';
	$Idtabungan = htmlentities(trim($_POST['id_tabungan']));
	$NIS = htmlentities(trim($_POST['nis']));
	$NamaSantri = htmlentities(trim($_POST['nama']));
	$KodeKmr = htmlentities(trim($_POST['kamar']));
	$Nominal = htmlentities(trim($_POST['nominal']));
	$tgl_tabungan = htmlentities(trim($_POST['tgl_tabungan']));


	$sql = ("INSERT INTO tb_tabungan VALUES ('$Idtabungan', '$NIS', '$NamaSantri', '$KodeKmr', '$Nominal', '$tgl_tabungan')") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: lap-tabungan.php");
