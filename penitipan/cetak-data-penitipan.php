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

    <style>
      .content {
        margin: auto;
        width: 90%;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      table tr td {
        padding: 5px;
      }
    </style>

    <!-- Bootstrap -->
  </head>

  <body onload="window.print();">
    <table style="width: 100%">
      <tr>
        <td width="8%">
          <img src="<?php echo urlx(); ?>/assets/img/DU logo.png" alt="" style="width:70px;height:70px;float: left;">


        </td>
        <td width="70%">
          <h4><b>ASRAMA IBNU SINA PONDOK PESANTREN DARUL ULUM</b></h4>
          <p>Peterongan Jombang </p>
        </td>

      </tr>
      <div class="content">
        <h1>CETAK DATA PENITIPAN</h1>
        <table border="1">
          <thead>
            <tr>
              <th width='5'>No.</th>
              <th>Id Penitipan</th>
              <th>nis</th>
              <th>Nama Santri</th>
              <th>Kamar</th>
              <th>nominal</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../lib/koneksi.php';

            if ($_SESSION['level'] == 'Walisantri') {
              $sql = "SELECT * FROM tb_penitipan WHERE status = 'success' AND nis = '" . $_SESSION['id'] . "'";
            } else {
              $sql = "SELECT * FROM tb_penitipan WHERE status = 'success'";
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
                  <td><?php echo $data['id_penitipan']; ?></td>
                  <td><?php echo $data['nis']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['kamar']; ?></td>
                  <td><?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                  <td><?php echo $data['tgl_penitipan']; ?></td>
                </tr>
            <?php
                $No++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
  </body>
  <script>
    window.print();
  </script>

  </html>
<?php
} else {
  header("location:../login.php");
}
?>