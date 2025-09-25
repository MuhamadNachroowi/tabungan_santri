<?php
	include '../lib/koneksi.php';
	$Idtabungan = $_GET['id_tabungan'];


	$sql = "DELETE FROM tb_tabungan WHERE id_tabungan = '$Idtabungan'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='lap-tabungan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='lap-tabungan.php';
			  </script>"; 
	}
?>
