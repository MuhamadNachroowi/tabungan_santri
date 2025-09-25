<?php
	include '../lib/koneksi.php';
	$Iduangbelanja = htmlentities(trim($_POST['id_uangbelanja']));
	$NIS = htmlentities(trim($_POST['nis']));
	$NamaSantri = htmlentities(trim($_POST['nama']));
	$KodeKmr = htmlentities(trim($_POST['kamar']));
	$Nominal = htmlentities(trim($_POST['nominal']));
	$Ket = htmlentities(trim($_POST['Ket']));
	$tgl_uangbelanja = htmlentities(trim($_POST['tgl_uangbelanja']));


	$sql = ("INSERT INTO tb_uangbelanja VALUES ('$Iduangbelanja', '$NIS', '$NamaSantri', '$KodeKmr', '$Nominal', '$Ket', '$tgl_uangbelanja')") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: lap-uangbelanja.php");
