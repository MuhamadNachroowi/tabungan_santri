<?php
	include '../lib/koneksi.php';
	$Idpengambilan = $_GET['id_pengambilan'];


	$sql = "DELETE FROM tb_pengambilan WHERE id_pengambilan = '$Idpengambilan'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='lap-pengambilan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='lap-pengambilan.php';
			  </script>"; 
	}
?>
