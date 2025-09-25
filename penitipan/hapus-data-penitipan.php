<?php
	include '../lib/koneksi.php';
	$id_penitipan = $_GET['id_penitipan'];


	$sql = "DELETE FROM tb_penitipan WHERE id_penitipan = '$id_penitipan'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='lap-penitipan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='lap-penitipan.php';
			  </script>"; 
	}
