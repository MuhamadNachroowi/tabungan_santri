<?php
	include '../lib/koneksi.php';
	$id = htmlentities(trim($_POST['id']));
	$user = htmlentities(trim($_POST['user']));
	$pass = htmlentities(trim($_POST['pass']));
	$level = htmlentities(trim($_POST['level']));

	$sql = ("INSERT INTO tb_user VALUES ('$id', '$user', md5('$pass'),'$level')") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data-user.php");
?>