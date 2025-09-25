<?php
include "../all_lib.php";
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>

<?php
  include "../lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/DU logo.png"/>
    <title><?php echo nama(); ?></title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../menu.php';
  ?>
  <div class="container container-form">
    <div class="row">
      <div class="span12">
      <div class="input-group">
      <legend>Entri Data Santri</legend>
        <form method="POST" action="simpan-data-santri.php">
          <div class="form-group">
            <div class="input-group">
            <label>NIS</label>
            <input type="text" name="NIS" class="form-control" id="NIS" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Nama Santri</label>
            <input type="text" name="NamaSantri" class="form-control" id="NamaSantri" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pilih Jenis Kelamin</label>
            <select name="JenisKelamin" class="form-control">
            <option selected="selected">Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Tempat Lahir</label>
            <textarea name="TempatLahir" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
              <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" disabled="disabled">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="TanggalLahir" value="1995-08-05">
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Alamat</label>
            <textarea name="AlamatSantri" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pilih Kamar</label>
            <select name="KodeKmr" class="form-control" required>
            <option value="" selected="selected">Kamar</option>
                <?php
                  include '../lib/koneksi.php';
                  $sql = "SELECT * FROM tb_kamar";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    echo "<option value=$data[KodeKmr]>$data[NamaKmr]</option>";
                  }
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>No HP Ortu</label>
            <input type="text" name="NoHpOrtu" class="form-control" id="NoHpOrtu" required>
            </div>
          </div>
          </div>
           <div class="form-group">
            <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" id="NoHpOrtu" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="NoHpOrtu" required>
            </div>
          </div>
          <input type="submit" class="btn btn-info" name="submit" value="Simpan">
        <a href="./data-santri.php" class="btn btn-info">Batal</a>
      </form>
      </div>
    </div>
  </div>
  </div>

  <?php
      include '../footer.php';
  ?>
  
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
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
}
else
{
 header("location:../login.php");
}
?>