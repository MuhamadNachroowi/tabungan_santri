<?php
	include '../lib/koneksi.php';
	$Iduangbelanja = $_GET['id_uangbelanja'];


	$sql = "DELETE FROM tb_uangbelanja WHERE id_uangbelanja = '$Iduangbelanja'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='lap-uangbelanja.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='lap-uangbelanja.php';
			  </script>"; 
	}
?>
