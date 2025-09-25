<?php
include "all_lib.php";
session_start();
if ($_SESSION['StatusLogin'] == "OK") {
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo nama(); ?></title>

    <!-- Bootstrap -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="./assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="./assets/css/navbar-static-top.css" rel="stylesheet">
  </head>

  <body>
    <?php
    include './menu.php';
    ?>
    <div class="container container-form">
      <div class="row">
        <div class="span12">
          <legend>Ubah Biodata Saya</legend>
          <?php
          include "./lib/koneksi.php";

          if ($_SESSION['level'] == "Admin") {

            if (isset($_POST['b1'])) {

              if (empty($_POST['nama']) or empty($_POST['jekel'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Error!</strong> Data tidak boleh ada yang kosong.
            </div>';
              } else {

                if ($_POST['pas_lama'] == $_POST['pas']) {
                  $pass = $_POST['pas'];
                } else {
                  $pass = md5($_POST['pas']);
                }

                $sql = mysqli_query($conn, "UPDATE tb_admin SET nm_admin='$_POST[nama]',jekel='$_POST[jekel]',notelp='$_POST[notelp]',alamat='$_POST[alamat]' where kd_admin='$_SESSION[id]'");

                $sql = mysqli_query($conn, "UPDATE tb_user SET username='$_POST[username]',password='$pass' where kd_user='$_SESSION[id]'");


                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Sukses!</strong> Data berhasil diperbarui.
            </div>';
              }
            }

            $sql = "SELECT * FROM tb_admin a JOIN tb_user b ON a.kd_admin=b.kd_user WHERE a.kd_admin = '$_SESSION[id]'";
            $result = mysqli_query($conn, $sql);
            $d = mysqli_fetch_array($result);


          ?>
            <form method="POST" action="">
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nama Admin</label>
                  <input type="text" name="nama" value="<?php echo $d['nm_admin']; ?>" class="form-control" id="NamaPtg" required></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jekel" value="<?php echo $d['jekel']; ?>" class="form-control" id="NamaPgn"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nomor Telepon</label>
                  <input type="text" name="notelp" value="<?php echo $d['notelp']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control" id="NamaPgn">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Password</label>
                  <input type="password" name="pas" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi" required>
                  <input type="hidden" name="pas_lama" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi">
                </div>
              </div>
              <input type="submit" class="btn btn-info" name="b1" value="Perbarui"></input>
            </form>
          <?php } ?>

          <?php
          include "./lib/koneksi.php";

          if ($_SESSION['level'] == "Guru" or $_SESSION['level'] == "KepSek") {

            if (isset($_POST['b2'])) {

              if (empty($_POST['nama']) or empty($_POST['jekel'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Error!</strong> Data tidak boleh ada yang kosong.
            </div>';
              } else {

                if ($_POST['pas_lama'] == $_POST['pas']) {
                  $pass = $_POST['pas'];
                } else {
                  $pass = md5($_POST['pas']);
                }

                $sql = mysqli_query($conn, "UPDATE tb_guru SET nm_guru='$_POST[nama]',jekel='$_POST[jekel]',gelar='$_POST[gelar]',agama='$_POST[agama]',no_telp='$_POST[notelp]',alamat='$_POST[alamat]' where nip='$_SESSION[id]'");

                $sql = mysqli_query($conn, "UPDATE tb_user SET username='$_POST[username]',password='$pass' where kd_user='$_SESSION[id]'");


                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Sukses!</strong> Data berhasil diperbarui.
            </div>';
              }
            }

            $sql = "SELECT * FROM tb_guru a JOIN tb_user b ON a.nip=b.kd_user WHERE a.nip = '$_SESSION[id]'";
            $result = mysqli_query($conn, $sql);
            $d = mysqli_fetch_array($result);


          ?>
            <form method="POST" action="">
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nama Guru</label>
                  <input type="text" name="nama" value="<?php echo $d['nm_guru']; ?>" class="form-control" id="NamaPtg" required></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jekel" value="<?php echo $d['jekel']; ?>" class="form-control" id="NamaPgn"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Agama</label>
                  <input type="text" name="agama" value="<?php echo $d['agama']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Gelar (*Sp.d)</label>
                  <input type="text" name="gelar" value="<?php echo $d['gelar']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nomor Telepon</label>
                  <input type="text" name="notelp" value="<?php echo $d['no_telp']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" class="form-control"></input>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control" id="NamaPgn">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Password</label>
                  <input type="password" name="pas" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi" required>
                  <input type="hidden" name="pas_lama" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi">
                </div>
              </div>
              <input type="submit" class="btn btn-info" name="b2" value="Perbarui"></input>
            </form>

          <?php } ?>
          <?php
          include "./lib/koneksi.php";

          if ($_SESSION['level'] == "Siswa") {

            if (isset($_POST['b3'])) {

              if (empty($_POST['nama']) or empty($_POST['jekel'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Error!</strong> Data tidak boleh ada yang kosong.
            </div>';
              } else {

                if ($_POST['pas_lama'] == $_POST['pas']) {
                  $pass = $_POST['pas'];
                } else {
                  $pass = md5($_POST['pas']);
                }
                $tgll = $_POST['tanggallahir'];

                $sql = mysqli_query($conn, "UPDATE tb_siswa SET NamaSiswa='$_POST[nama]',JenisKelamin='$_POST[jekel]',TempatLahir='$_POST[tempatlahir]',TanggalLahir='$tgll',Agama='$_POST[agama]',AlamatSiswa='$_POST[alamat]',NoHpOrtu='$_POST[nohportu]' where nis='$_SESSION[id]'");

                $sql = mysqli_query($conn, "UPDATE tb_user SET username='$_POST[username]',password='$pass' where kd_user='$_SESSION[id]'");


                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Sukses!</strong> Data berhasil diperbarui.
            </div>';
              }
            }

            $sql = "SELECT * FROM tb_siswa a JOIN tb_user b ON a.nis=b.kd_user WHERE a.nis = '$_SESSION[id]'";
            $result = mysqli_query($conn, $sql);
            $d = mysqli_fetch_array($result);


          ?>
            <form method="POST" action="">
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nama Siswa</label>
                  <input type="text" name="nama" value="<?php echo $d['NamaSiswa']; ?>" class="form-control" id="NamaPtg" required></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jekel" value="<?php echo $d['JenisKelamin']; ?>" class="form-control" id="NamaPgn"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempatlahir" value="<?php echo $d['TempatLahir']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggallahir" value="<?php echo $d['TanggalLahir']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Agama</label>
                  <input type="text" name="agama" value="<?php echo $d['Agama']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nomor Telepon Orang Tua</label>
                  <input type="text" name="nohportu" value="<?php echo $d['NoHpOrtu']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $d['AlamatSiswa']; ?>" class="form-control"></input>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control" id="NamaPgn">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Password</label>
                  <input type="password" name="pas" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi" required>
                  <input type="hidden" name="pas_lama" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi">
                </div>
              </div>
              <input type="submit" class="btn btn-info" name="b3" value="Perbarui"></input>
            </form>

          <?php } ?>

          <?php
          include "./lib/koneksi.php";

          if ($_SESSION['level'] == "Ortu") {

            if (isset($_POST['b10'])) {

              if (empty($_POST['nama']) or empty($_POST['jekel'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Error!</strong> Data tidak boleh ada yang kosong.
            </div>';
              } else {

                if ($_POST['pas_lama'] == $_POST['pas']) {
                  $pass = $_POST['pas'];
                } else {
                  $pass = md5($_POST['pas']);
                }

                $sql = mysqli_query($conn, "UPDATE tb_ortu SET nm_ortu='$_POST[nama]',jekel='$_POST[jekel]',agama='$_POST[agama]',no_telp='$_POST[notelp]',alamat='$_POST[alamat]' where kdortu='$_SESSION[id]'");

                $sql = mysqli_query($conn, "UPDATE tb_user SET username='$_POST[username]',password='$pass' where kd_user='$_SESSION[id]'");


                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <strong>Sukses!</strong> Data berhasil diperbarui.
            </div>';
              }
            }

            $sql = "SELECT * FROM tb_ortu a JOIN tb_user b ON a.kdortu=b.kd_user WHERE a.kdortu = '$_SESSION[id]'";
            $result = mysqli_query($conn, $sql);
            $d = mysqli_fetch_array($result);


          ?>
            <form method="POST" action="">
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nama Ortu</label>
                  <input type="text" name="nama" value="<?php echo $d['nm_ortu']; ?>" class="form-control" id="NamaPtg" required></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jekel" value="<?php echo $d['jekel']; ?>" class="form-control" id="NamaPgn"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Agama</label>
                  <input type="text" name="agama" value="<?php echo $d['agama']; ?>" class="form-control"></input>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Nomor Telepon</label>
                  <input type="text" name="notelp" value="<?php echo $d['no_telp']; ?>" class="form-control"></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" class="form-control"></input>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control" id="NamaPgn">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group col-md-4">
                  <label>Password</label>
                  <input type="password" name="pas" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi" required>
                  <input type="hidden" name="pas_lama" value="<?php echo $d['password']; ?>" class="form-control" id="Sandi">
                </div>
              </div>
              <input type="submit" class="btn btn-info" name="b10" value="Perbarui"></input>
            </form>

          <?php } ?>

          <br>
        </div>
      </div>
    </div>

    <?php
    include './footer.php';
    ?>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
      });
    </script>
  </body>

  </html>
<?php
} else {
  header("location:./login.php");
}
?>