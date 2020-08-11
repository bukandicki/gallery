<?php
  session_start();
  include '../setting/koneksi.php';
  $nama = $_SESSION['NAMA'];
  $id = $_SESSION['ID'];
  $username = $_SESSION['USERNAME'];
  $panggil = mysql_query("SELECT * FROM user WHERE ID = '$id'");
  $panggil2 = mysql_query("SELECT PHOTO FROM photo_upload WHERE AUTHOR = '$username'");
  $resultt = mysql_fetch_array($panggil);
  $hitung = mysql_num_rows($panggil2);
  $_SESSION['FOTO'] = $resultt['FOTO'];
  $_SESSION['USERNAME'] = $resultt['USERNAME'];
  if (!isset($_SESSION['USERNAME'])) {
    ?>
      <script type="text/javascript">window.location.href="../index.php"</script>
    <?php
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="../css/master.css">
  	<link rel="stylesheet" type="text/css" href="../lightroom/css/lightbox.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/fontawesome-all.css">
  	<script type="text/javascript" src="../js/jquery.js"></script>
  	<!-- <script type="text/javascript" src="lightroom/js/lightbox.js"></script> -->
  	<script type="text/javascript" src="../js/master.js"></script>
    <title>Profile anda</title>
  </head>
  <body>
    <section class="sectama" style="height: 100vh;">
      <header class="headertama">
        <div class="container-header-tama">
  				<div class="logo">
  					<button onclick="window.history.go(-1)"><i class="fas fa-chevron-left" style="font-size: 1.2em;color: #fff;"></i></button>&nbsp;<img src="../img/logo1.png">
  				</div>
  			</div>
      </header>
      <div class="container-section">
        <div class="wrap-info-user">
          <div class="body-info-user">
            <div class="wrap-foto-user-info">
              <div class="foto-info-user photo-user">
                <img class="" src="../img/<?php echo $_SESSION['FOTO']; ?>">
              </div>
              <div class="name-info-user">
                <span><?php echo $nama; ?></span>
              </div>
              <div class="name-info-user">
                <span>username : <?php echo $username; ?></span>
              </div>
            </div>

              <div class="href_edit">
                <a href="edit.php?id=<?php echo $resultt['ID']; ?>"><i class="fas fa-pencil-alt"></i></a>
              </div>
              <div class="notif-info">
                <a href="#"><i class="fas fa-bell"></i></a>
              </div>

              <div style="display: flex;flex-direction: column;width: 100%;margin-top: 15em;">
                <div class="upload-info-user">
                <i class="icon-info fas fa-phone"></i>&nbsp;<span>No Telepon</span><p style="position: absolute;right: 0;top: 0;"><?php echo $resultt['TELEPON']; ?></p>
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                <i class="icon-info fas fa-camera"></i>&nbsp;<span>Foto</span><p style="position: absolute;right: 0;top: 0;"><?php echo $hitung; ?></p>
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                  <i class="icon-info fas fa-calendar-alt"></i>&nbsp;<span>Tanggal Lahir</span><p style="position: absolute;right: 0;top: 0;"><?php echo $resultt['TANGGAL_LAHIR']; ?></p>
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                  <i class="icon-info fas fa-shield-alt"></i>&nbsp;<span>Kode keamanan</span><p style="position: absolute;right: 0;top: 0;"><?php echo $resultt['KODE_KEAMANAN']; ?></p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
