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
  ?>
  <div class="container container-form">
  <div class="row">
  <legend>Manajemen Data Santri</legend>
  <p><a href="tambah-data-santri.php"><button type="button" class="btn btn-primary">Tambah Data</button></a></p>
  <div class="form-group">
            <div class="input-group">
            <label>Pilih Kamar</label>
            <form action="" method="Post">
           <select name="KodeKmr" class="form-control" onchange="this.form.submit();">
      <option value="">Kamar</option>
        <?php
        include '../lib/koneksi.php';
          $sql = "SELECT * FROM tb_kamar";
          $result = mysqli_query($conn, $sql);
       
          while($data=mysqli_fetch_array($result)){ ?>
           <option value="<?php echo $data['KodeKmr']; ?>" <?php if(isset($_POST['KodeKmr']) and $_POST['KodeKmr']==$data['KodeKmr']){ echo "Selected"; }else{ echo "";} ?>><?php echo $data['NamaKmr']; ?></option>
        <?php } ?>
      </select>
      </form>
            </div>
          </div>
          
  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="example2">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>NIS</th>
        <th>Nama Santri</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Kamar</th>
        <th>No HP Ortu</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        if(isset($_POST['KodeKmr']))
      {
        $kodeKamar = $_POST['KodeKmr'];
        $sql = "SELECT * FROM tb_santri LEFT JOIN tb_kamar ON tb_santri.KodeKmr=tb_kamar.KodeKmr WHERE tb_santri.KodeKmr='$kodeKamar'";
      }else{
        $sql = "SELECT * FROM tb_santri LEFT JOIN tb_kamar ON tb_santri.KodeKmr=tb_kamar.KodeKmr";
      }
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='200'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSantri']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir']; ?></td>
        <td><?php echo $data['TanggalLahir']; ?></td>
        <td><?php echo $data['AlamatSantri']; ?></td>
        <td><?php echo $data['NamaKmr']; ?></td>
        <td><?php echo $data['NoHpOrtu']; ?></td>
        <td align="center">
        <a href="ubah-data-santri.php?NIS=<?php echo $data['NIS'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> ||
        <a href="hapus-data-santri.php?NIS=<?php echo $data['NIS'];?>">
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
          "lengthChange": false,
          "searching": false,
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