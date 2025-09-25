<?php
	include '../lib/koneksi.php';
	$id_pengambilan = htmlentities(trim($_POST['id_pengambilan']));
	$nis = htmlentities(trim($_POST['nis']));
	$nama = htmlentities(trim($_POST['nama']));
	$KodeKmr = htmlentities(trim($_POST['kamar']));
	$nominal = htmlentities(trim($_POST['nominal']));
	$tgl_pengambilan = htmlentities(trim($_POST['tgl_pengambilan']));



$sql = ("UPDATE tb_pengambilan SET nis = '$nis', nama = '$nama', 
		kamar = '$KodeKmr', nominal = '$nominal', tgl_pengambilan = '$tgl_pengambilan'WHERE id_pengambilan = '$id_pengambilan'")
	or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='lap-pengambilan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='lap-pengambilan.php';
			  </script>"; 
	}
	header("location:lap-pengambilan.php");
?>