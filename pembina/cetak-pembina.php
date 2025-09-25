<?php
error_reporting(0);
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
  </head>
  <body> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/logo.png"/>
   <link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
</style>

<body onload="window.print();">
    <table style="width: 100%">
        <tr>
           <td width="8%">
            <img src="<?php echo urlx(); ?>/assets/img/logo-login.png" alt="" style="width:70px;height:70px;float: left;">
   

          </td>
          <td width="70%"> 
          <h4><b>Asrama Ibnu Sina Ponpes Darul Ulum</b></h4>
    <p>Peterongan Jombang</p></td>
         
        </tr>

    </table>
     <?php
  include '../lib/koneksi.php';

  ?>
  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center>LAPORAN DATA PEMBINA</center>
 <center>Per Tanggal: <b><?php echo date('d F Y'); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
  <table class="table table-condensed table-bordered" id="example2">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>NIP</th>
        <th>Nama Pembina</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Gelar</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
     
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
        <td><?php echo $data['nip']; ?></td>
        <td><?php echo $data['nm_pembina']; ?></td>
        <td><?php echo $data['jekel']; ?></td>
        <td><?php echo $data['agama']; ?></td>
        <td><?php echo $data['gelar']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['no_telp']; ?></td>
 
      </tr>
      <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>
  </div>
<div class="ttd" style="float: left;">
  DIKETAHUI<br>
  Pengasuh

  <br>
  <br>
  <br>
  <?php
  include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_kepsek";
        $result = mysqli_query($conn, $sql);
        $d = mysqli_fetch_array($result);
  ?>
<div style="border-bottom: 1px solid #555">(<?php echo strtoupper($d['nm_kepsek']);  ?>)</div>
NIP : <?php echo $d['nip'];  ?>
</div>
<!-- <div class="ttd" style="float: right;">
  Padang , <?php echo date('d F Y'); ?><br>
  PENGURUS BARANG
  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555">(MARDIYOS S.SOS)</div>
NIP : 195810291987031003
</div> -->
</body>
</html>

<?php
}
else
{
 header("location:../login.php");
}
?>