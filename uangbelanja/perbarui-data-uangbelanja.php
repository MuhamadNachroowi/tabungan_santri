<?php
	include '../lib/koneksi.php';
	$Iduangbelanja = htmlentities(trim($_POST['id_uangbelanja']));
	$NIS = htmlentities(trim($_POST['nis']));
	$NamaSantri = htmlentities(trim($_POST['nama']));
	$KodeKmr = htmlentities(trim($_POST['kamar']));
	$Nominal = htmlentities(trim($_POST['nominal']));
	$Ket = htmlentities(trim($_POST['Ket']));
	$tgl_uangbelanja = htmlentities(trim($_POST['tgl_uangbelanja']));



	$sql = ("UPDATE tb_uangbelanja SET nis = '$NIS', nama = '$NamaSantri', 
		kamar = '$KodeKmr', nominal = '$Nominal', Ket = '$Ket', tgl_uangbelanja = '$tgl_uangbelanja'WHERE id_uangbelanja = '$Iduangbelanja'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='lap-uangbelanja.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='lap-uangbelanja.php';
			  </script>"; 
	}
	header("location:lap-uangbelanja.php");
?>