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
          <a target="_blank" href="cetak-data-penitipan.php" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak</a>
        </p>

        <div class="table-responsive">
          <table class="table table-condensed table-bordered" id="example2">
            <thead>
              <tr>
                <th width='5'>No.</th>
                <th>Id Penitipan</th>
                <th>NIS</th>
                <th>Nama Santri</th>
                <th>Kamar</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Status</th>
                <?php if ($_SESSION['level'] == 'Pembina') : ?>
                  <th align="center">Aksi</th>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'Walisantri') : ?>
                  <th align="center">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../lib/koneksi.php';

              $sql = "SELECT * FROM tb_penitipan where nis = '" . $_GET['nis'] . "'";

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
                    <td><?php echo $data['id_penitipan']; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                    <td><?php echo $data['tgl_penitipan']; ?></td>
                    <td><?php echo $data['jenis']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <?php if ($_SESSION['level'] == 'Pembina') : ?>
                      <td align="center">
                        <a href="ubah-data-penitipan.php?id_penitipan=<?php echo $data['id_penitipan']; ?>">
                          <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                        </a> ||
                        <a href="hapus-data-penitipan.php?id_penitipan=<?php echo $data['id_penitipan']; ?>">
                          <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
                        </a>
                      </td>
                    <?php endif; ?>
                    <?php if ($_SESSION['level'] == 'Walisantri') : ?>
                      <td align="center">
                        <?php if ($data['status'] == 'pending') : ?>
                        <a class="btn btn-danger btn-sm" href="../transaksi/checkout.php?id=<?php echo $data['id_penitipan']; ?>">
                          Bayar
                        </a>
                        <?php endif; ?>
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