<?php
	include '../lib/koneksi.php';
	$NIP = htmlentities(trim($_POST['NIP']));
	$NamaPembina = htmlentities(trim($_POST['NamaPembina']));
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
	$AlamatPembina = htmlentities(trim($_POST['AlamatPembina']));
	$NoHp = htmlentities(trim($_POST['NoHp']));



	$sql = ("UPDATE tb_pembina SET NamaPembina = '$NamaPembina', JenisKelamin = '$JenisKelamin', 
		AlamatPembina = '$AlamatPembina', NoHp = '$NoHp' WHERE NIP = '$NIP'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-pembina.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Diubah'); 
				window.location.href='data-pembina.php';
			  </script>"; 
	}
	header("location:data-pembina.php");
?>