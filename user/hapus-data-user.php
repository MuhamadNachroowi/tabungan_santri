<?php
	include '../lib/koneksi.php';
	$ID = $_GET['id'];


	$sql = "DELETE FROM tb_user WHERE id_user = '$ID'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-user.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-user.php';
			  </script>"; 
	}
?>
