<?php
include "../all_lib.php";
session_start();
if ($_SESSION['StatusLogin'] == "OK") {
?>

  <?php
  include "../lib/koneksi.php";

  $id_pengambilan = htmlentities($_GET['id_pengambilan']);
  $sql = "SELECT * FROM tb_pengambilan WHERE id_pengambilan = '$id_pengambilan'";
  $result = mysqli_query($conn, $sql);
  $i = mysqli_fetch_array($result);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <?php
  // include '../header.php';
  ?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
          <legend>Ubah Data Pengambilan</legend>
          <form method="POST" action="perbarui-data-pengambilan.php">
            <div class="form-group ">
              <div class="input-group">
                <label>Id Pengambilan</label>
                <input type="text" name="id_pengambilan" value="<?php echo $i['id_pengambilan']; ?>" class="form-control" required readonly></input>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <label>NIS</label>
                <input type="text" name="nis" value="<?php echo $i['nis']; ?>" class="form-control" id="nis" required></input>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label>Nama Santri</label>
                  <input type="text" name="nama" value="<?php echo $i['nama']; ?>" class="form-control" id="nama" required></input>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label>Pilih Kamar</label>
                  <select name="kamar" class="form-control" required>
                    <option value="" selected="selected">Kamar</option>
                    <?php
                    include '../lib/koneksi.php';
                    $sql = "SELECT * FROM tb_kamar";
                    $result = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($result)) {
                      echo "<option value=$data[NamaKmr]>$data[NamaKmr]</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label>Nominal</label>
                  <input type="int" name="nominal" class="form-control" id="nominal" value="<?php echo $i['nominal']; ?>" required></input>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Tanggal Pengambilan</label>
              <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" type="text" disabled="disabled" value="<?php echo $i['tgl_pengambilan']; ?>">
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
              <input type="hidden" id="dtp_input2" name="tgl_pengambilan" value="2020-01-19">
            </div>

            <input type="submit" class="btn btn-info" name="submit" value="Perbarui">
            <a href="./lap-pengambilan.php" class="btn btn-info">Batal</a>
          </form><br>
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
  header("location:../login.php");
}
?>