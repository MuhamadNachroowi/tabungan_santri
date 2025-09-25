<?php

include 'lib/koneksi.php';

$username = $_POST['username'];
$pass = md5($_POST['password']);

$sql = ("SELECT * FROM tb_user WHERE username = '$username' AND password = '$pass'");
$result = mysqli_query($conn, $sql) or die(mysql_error());

if (mysqli_num_rows($result) == 1) {
	$p = mysqli_fetch_array($result);

	if ($p['level'] == "Admin") {

		$h = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin='$p[id_user]'"));
		$id = $h['id_admin'];
		$jekel = $h['jekel'];
		$nama = $h['nama_admin'];
	} elseif ($p['level'] == "Pembina") {

		$h = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_pembina WHERE NIP='$p[id_user]'"));
		$id = $h['NIP'];
		$jekel = $h['JenisKelamin'];
		$nama = $h['NamaPembina'];
	} elseif ($p['level'] == "Walisantri") {

		$h = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_walisantri WHERE id_walisantri='$p[id_user]'"));
		$id = $h['id_walisantri'];
		$jekel = $h['jekel'];
		$nama = $h['nama_walisantri'];
	}

	session_start();
	$_SESSION['id'] = $id;
	$_SESSION['jekel'] = $jekel;
	$_SESSION['nama'] = $nama;
	$_SESSION['level'] = $p['level'];
	$_SESSION['StatusLogin'] = "OK";
	header("location: index.php");
} else {
?>
	<script>
		alert("Username atau password salah !");
		history.go(-1);
	</script>
<?php
}

?>