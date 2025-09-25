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


	$sql = ("UPDATE tb_santri SET NamaSantri = '$NamaSantri', JenisKelamin = '$JenisKelamin', 
		TempatLahir = '$TempatLahir', TanggalLahir = '$TanggalLahir', AlamatSantri = '$AlamatSantri', KodeKmr = '$KodeKmr', NoHpOrtu = '$NoHpOrtu' WHERE NIS = '$NIS'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
					alert('Data Berhasil Diubah'); 
					window.location.href='data-santri.php';
				  </script>";
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
					alert('Data Gagal di Edit'); 
					window.location.href='data-santri.php';
				  </script>";
	}
	header("location:data-santri.php");
	