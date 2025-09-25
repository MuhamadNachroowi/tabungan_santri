<?php
	include '../lib/koneksi.php';
	$id = htmlentities(trim($_POST['id']));
	$user = htmlentities(trim($_POST['user']));
	$pass = htmlentities(trim($_POST['pass']));
	$level = htmlentities(trim($_POST['level']));

	$sql = ("UPDATE tb_user SET username ='$user', 
		password = md5('$pass'),level='$level' WHERE id_user = '$id'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-user.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-user.php';
			  </script>"; 
	}
	header("location:data-user.php");
?>