<?php
include "../all_lib.php";
  session_start();
  if($_SESSION['StatusLogin']=="OK")
  {
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
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
  </head>
  <body>
  <?php
    include '../menu.php';
    $KodeKmr = isset($_POST['KodeKmr'])? $_POST['KodeKmr'] : '';
  ?>
  <div class="container container-form">
  <div class="row">
  <legend>Manajemen Data Pembina</legend>
  <p><a href="tambah-data-pembina.php"><button type="button" class="btn btn-primary">Tambah Data</button></a></p>

  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="example2">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>NIP</th>
        <th>Nama Pembina</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
     
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
     
        $sql = "SELECT * FROM tb_pembina";
    
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIP']; ?></td>
        <td><?php echo $data['NamaPembina']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['AlamatPembina']; ?></td>
        <td><?php echo $data['NoHp']; ?></td>
     
        <td align="center">
        <a href="ubah-data-pembina.php?NIP=<?php echo $data['NIP'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> ||
        <a href="hapus-data-pembina.php?NIP=<?php echo $data['NIP'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </a>
        </td>
      </tr>
      <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>
  </div>
  </div>
  </div>
  <?php
      include '../footer.php';
  ?>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
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