<!-- Static navbar -->
<div class="logo hidden-print">
  <img src="<?php echo urlx(); ?>/assets/img/DU logo.png" />
  <div class="identi ">
    <h3 class="nm"><?php echo nama(); ?></h3>
    <p class="alm"><?php echo alm(); ?></p>
  </div>
</div>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo urlx(); ?>/index.php" class="dropdown-toggle">Home</a>

        </li>

        <?php if ($_SESSION['level'] == "Pembina") { ?>

          <li class="dropdown">
            <a href="<?php echo urlx(); ?>/santri/data-santri.php" class="dropdown-toggle">Data Santri</a>
          </li>

          <!-- <li class="dropdown">
      <a href="<?php echo urlx(); ?>/pembina/lap-pembina.php" class="dropdown-toggle">Data Pembina</a>
      </li> -->

        <?php } elseif ($_SESSION['level'] == "Admin") { ?>

          <li class="dropdown">
            <a href="<?php echo urlx(); ?>/santri/lap-santri.php" class="dropdown-toggle">Data Santri</a>
          </li>

          <li class="dropdown">
            <a href="<?php echo urlx(); ?>/pembina/data-pembina.php" class="dropdown-toggle">Data Pembina</a>
          </li>


        <?php } elseif ($_SESSION['level'] == "Walisantri") { ?>

          <li class="dropdown">
            <!-- <a href="<?php echo urlx(); ?>/transaksi/checkout-process.php" class="dropdown-toggle">Transaksi</a> -->
            <a href="<?php echo urlx(); ?>/transaksi/formulir.php" class="dropdown-toggle">Transaksi</a>
          </li>


        <?php } ?>


      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a><span class="glyphicon glyphicon-user"></span> <?php echo "Selamat datang, " . $_SESSION['nama']; ?></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-out"></span> <?php echo $_SESSION['level']; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo urlx(); ?>/profil-user.php">Biodata Saya</a></li>
            <li><a href="<?php echo urlx(); ?>/logout.php">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>