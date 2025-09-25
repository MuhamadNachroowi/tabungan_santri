<?php
include "lib/koneksi.php";
include "all_lib.php";
session_start();
$_SESSION['StatusLogin'];
if ($_SESSION['StatusLogin'] == "OK") {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/Du logo.png" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo nama(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <title>Highcharts Example</title>

    <style type="text/css">
      .highcharts-figure,
      .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
      }

      #container {
        height: 400px;
      }

      .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
      }

      .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
      }

      .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
      }

      .highcharts-data-table td,
      .highcharts-data-table th,
      .highcharts-data-table caption {
        padding: 0.5em;
      }

      .highcharts-data-table thead tr,
      .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
      }

      .highcharts-data-table tr:hover {
        background: #f1f7ff;
      }
    </style>
  </head>

  <body class="body" style="">
    <?php
    include 'menu.php';
    ?>
    <?php
    ?>
    <div class="container">
      <?php if ($_SESSION['level'] == "Pembina") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/penitipan/lap-penitipan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Penitipan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Pembina") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/pengambilan/lap-pengambilan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Pengambilan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Pembina") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/tabungan/lap-tabungan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Tabungan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Pembina") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/uangbelanja/lap-uangbelanja.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Uang Belanja</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Walisantri") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/penitipan/lap-penitipan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Laporan Data Penitipan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Walisantri") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/pengambilan/lap-pengambilan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Laporan Data Pengambilan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Walisantri") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/tabungan/lap-tabungan.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Laporan Data Tabungan</div>
            </div>
          </a>
        </div>
      <?php } ?>
      <?php if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Walisantri") { ?>
        <div class="col-md-6">
          <a href="<?php echo urlx(); ?>/uangbelanja/lap-uangbelanja.php" class="card-a">
            <div class="card">
              <div class="card-icon"><i class="fa fa-edit"></i></div>
              <div class="card-head">Laporan Data Uang Belanja</div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
    <?php

    include "footer.php"; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

    <script src="assets/code/highcharts.js"></script>
    <script src="assets/code/modules/exporting.js"></script>
    <script src="assets/code/modules/export-data.js"></script>
    <script src="assets/code/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
      <div id="container"></div>
      <p class="highcharts-description">
        Bagan batang menunjukkan kolom horizontal
      </p>
    </figure>



    <script type="text/javascript">
      Highcharts.chart('container', {
        chart: {
          type: 'bar'
        },
        title: {
          text: 'Histori Data Uang Saku'
        },
        subtitle: {
          text: 'Source: Data Uang Saku Asrama Ibnu Sina</a>'
        },
        xAxis: {
          categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
          ],
          title: {
            text: null
          }
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Jumlah Santri',
            align: 'high'
          },
          labels: {
            overflow: 'justify'
          }
        },
        tooltip: {
          valueSuffix: ' santri'
        },
        plotOptions: {
          bar: {
            dataLabels: {
              enabled: true
            }
          }
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -40,
          y: 80,
          floating: true,
          borderWidth: 1,
          backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
          shadow: true
        },
        credits: {
          enabled: false
        },
        series: [{
          name: 'Penitipan',
          data: [20, 21, 24, 30, 29]
        }, {
          name: 'Pengambilan',
          data: [19, 18, 15, 20, 22]
        }, {
          name: 'Tabungan',
          data: [3, 6, 7, 11, 13]
        }, {
          name: 'Uang Belanja',
          data: [2, 5, 2, 6, 8]
        }]
      });
    </script>
  </body>

  </html>
  <script>
    $(function() {
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
<?php
} else {
  header("location:login.php");
}
?>