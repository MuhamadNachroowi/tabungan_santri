<?php
	include '../lib/koneksi.php';
	$Idtabungan = htmlentities(trim($_POST['id_tabungan']));
	$NIS = htmlentities(trim($_POST['nis']));
	$NamaSantri = htmlentities(trim($_POST['nama']));
	$KodeKmr = htmlentities(trim($_POST['kamar']));
	$Nominal = htmlentities(trim($_POST['nominal']));
	$tgl_tabungan = htmlentities(trim($_POST['tgl_tabungan']));



	$sql = ("UPDATE tb_tabungan SET nis = '$NIS', nama = '$NamaSantri', 
		kamar = '$KodeKmr', nominal = '$Nominal', tgl_tabungan = '$tgl_tabungan'WHERE id_tabungan = '$Idtabungan'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='lap-tabungan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='lap-tabungan.php';
			  </script>"; 
	}
	header("location:lap-tabungan.php");
?>