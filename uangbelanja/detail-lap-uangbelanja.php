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
        <legend>Uang Belanja</legend>
        <p>
          <a target="_blank" href="cetak-data-uangbelanja.php" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak</a>
        </p>

        <div class="table-responsive">
          <table class="table table-condensed table-bordered" id="example2">
            <thead>
              <tr>
                <th width='5'>No.</th>
                <th>Id Uangbelanja</th>
                <th>NIS</th>
                <th>Nama Santri</th>
                <th>Kamar</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <?php if ($_SESSION['level'] == 'Pembina') : ?>
                  <th align="center">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../lib/koneksi.php';

              $sql = "SELECT * FROM tb_uangbelanja where nis = '" . $_GET['nis'] . "'";

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
                    <td><?php echo $data['id_uangbelanja']; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                    <td><?php echo $data['Ket']; ?></td>
                    <td><?php echo $data['tgl_uangbelanja']; ?></td>
                    <?php if ($_SESSION['level'] == 'Pembina') : ?>
                      <td align="center">
                        <a href="ubah-data-uangbelanja.php?id_uangbelanja=<?php echo $data['id_uangbelanja']; ?>">
                          <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                        </a> ||
                        <a href="hapus-data-uangbelanja.php?id_uangbelanja=<?php echo $data['id_uangbelanja']; ?>">
                          <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
                        </a>
                      </td>
                    <?php endif; ?>
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