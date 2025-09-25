<?php
include "../all_lib.php";
session_start();
if ($_SESSION['StatusLogin'] == "OK") {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/DU logo.png" />
    <title><?php echo nama(); ?></title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css" />
  </head>

  <body>
    <?php
    include '../menu.php';
    ?>
    <div class="container container-form">
      <div class="row">
        <legend>Penitipan</legend>
        <p>
          <?php if ($_SESSION['level'] == 'Pembina') : ?>
            <a target="_blank" href="cetak-data-penitipan.php" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak</a>
            <a href="tambah-data-penitipan.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
          <?php endif; ?>
        </p>

        <div class="table-responsive">
          <table class="table table-condensed table-bordered" id="example2">
            <thead>
              <tr>
                <th width='5'>No.</th>
                <th>NIS</th>
                <th>Nama Santri</th>
                <th>Kamar</th>
                <th>Total Penitipan</th>
                <th>Sisa Uang Saku</th>
                <th align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../lib/koneksi.php';

              if ($_SESSION['level'] == 'Walisantri') {
                $sql = "SELECT *, 
                (SELECT NamaKmr FROM tb_kamar WHERE KodeKmr = tb_santri.KodeKmr) AS kamar, 
                (SELECT SUM(nominal) FROM tb_penitipan WHERE status = 'success' AND nis = tb_santri.NIS) AS nominal ,
                (SELECT SUM(nominal) FROM tb_pengambilan WHERE nis = tb_santri.NIS) AS nominal_pengambilan ,
                (SELECT SUM(nominal) FROM tb_tabungan WHERE nis = tb_santri.NIS) AS nominal_tabungan ,
                (SELECT SUM(nominal) FROM tb_uangbelanja WHERE nis = tb_santri.NIS) AS nominal_uangbelanja
                FROM tb_santri where NIS = '" . $_SESSION['id'] . "'";
              } else {
                $sql = "SELECT *, 
                (SELECT NamaKmr FROM tb_kamar WHERE KodeKmr = tb_santri.KodeKmr) AS kamar, 
                (SELECT SUM(nominal) FROM tb_penitipan WHERE status = 'success' AND nis = tb_santri.NIS) AS nominal ,
                (SELECT SUM(nominal) FROM tb_pengambilan WHERE nis = tb_santri.NIS) AS nominal_pengambilan ,
                (SELECT SUM(nominal) FROM tb_tabungan WHERE nis = tb_santri.NIS) AS nominal_tabungan ,
                (SELECT SUM(nominal) FROM tb_uangbelanja WHERE nis = tb_santri.NIS) AS nominal_uangbelanja
                FROM tb_santri";
              }

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
                    <td><?php echo $data['NIS']; ?></td>
                    <td><?php echo $data['NamaSantri']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($data['nominal'] - $data['nominal_pengambilan'] - $data['nominal_tabungan'] - $data['nominal_uangbelanja'], 0, ',', '.'); ?></td>

                    <td align="center">
                      <a href="detail-lap-penitipan.php?nis=<?php echo $data['NIS']; ?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Detail"></span>
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
      $(function() {
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
} else {
  header("location:../login.php");
}
?>