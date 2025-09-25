<?php
include "../all_lib.php";
session_start();
if($_SESSION['StatusLogin']=="OK"){
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
      <legend>Tambah Data User</legend>
        <form method="POST" action="simpan-data-user.php"> 
        <div class="form-group">
            <div class="input-group col-md-3">
            <label>ID User (Id_pembina,Id_walisantri,Id_admin)</label>
            <input type="text" name="id" class="form-control" id="NamaPtg" required></input>
            </div>
          </div>       
           <div class="form-group">
            <div class="input-group col-md-3">
            <label>Username</label>
            <input type="text" name="user" class="form-control" id="NamaPtg" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-3">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" id="NamaPgn" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-3">
            <label>Level</label>
           <select class="form-control" name="level">
             <option value="">-Level-</option>
               <option value="Pembina">Pembina</option>
               <option value="walisantri">Walisantri</option>
                <option value="Admin">Admin</option>
           </select>
            </div>
          </div>
        <input type="submit" class="btn btn-info" name="submit" value="Simpan"></input><br>
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