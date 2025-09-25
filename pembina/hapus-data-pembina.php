<?php
	include '../lib/koneksi.php';
	$NIP = $_GET['NIP'];


	$sql = "DELETE FROM tb_pembina WHERE NIP = '$NIP'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-pembina.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-pembina.php';
			  </script>"; 
	}
?>
