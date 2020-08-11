<?php
  session_start();
  error_reporting(0);
  include '../setting/koneksi.php';
  $id = $_GET['id'];
  $panggil = mysql_query("SELECT * FROM user WHERE ID = '$id'");
  $resultt = mysql_fetch_array($panggil);
  $username = $resultt['USERNAME'];
  $panggil2 = mysql_query("SELECT PHOTO FROM photo_upload WHERE AUTHOR = '$username'");
  $hitung = mysql_num_rows($panggil2);

  if (!isset($_SESSION['USERNAME'])) {
    ?>
      <script type="text/javascript">window.location.href="../index.php"</script>
    <?php
  }
  if (isset($_POST['edit'])) {
    $nama = $_POST['edit_nama'];
    $usernamee = $_POST['edit_username'];
    $password = $_POST['edit_password'];
    $kode = $_POST['edit_kode'];
    if (empty($nama) || empty($usernamee) || empty($password) || empty($kode)) {
      echo "<script>alert('Form kosong');</script>";
        echo "<script>window.history.go(-1)</script>";
    }else {
    if ($result == 0) {
    $input = mysql_query("UPDATE user SET NAMA = '$nama',USERNAME = '$usernamee',PASSWORD = '$password',KODE_KEAMANAN = '$kode'");
      if ($input) {
        echo "<script>alert('Edit Berhasil');</script>";
        echo "<script>window.location.href='profile.php'</script>";
      }else {
        echo "<script>alert('Edit Gagal');</script>";
        echo "<script>window.history.go(-1)</script>";
      }
    }else{
      echo "<script>alert('Maaf,Username sudah terdaftar');</script>";
      echo "<script>window.history.go(-1);</script>";
    }
    }
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
    <title>Edit profile</title>
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
            <div class="wrap-foto-user-info" style="top: 5%;left: 38%;">
              <div class="foto-info-user photo-user">
                <img class="" src="../img/<?php echo $_SESSION['FOTO']; ?>">
              </div>
              <div class="name-info-user">
                <span><?php echo $resultt['NAMA']; ?></span>
              </div>
              <div style="margin: auto;">
                <span>username : <?php echo $resultt['USERNAME']; ?></span>
              </div>
            </div>
              <form action="edit.php" method="POST" id="formedit" style="display: flex;flex-direction: column;width: 100%;margin-top: 15em;">
                <div>
                <div class="upload-info-user">
                <i class="icon-info fas fa-address-card"></i>&nbsp;<span>Nama</span><input type="text" name="edit_nama" id="edit_nama" placeholder="<?php echo $resultt['NAMA']; ?>">
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                <i class="icon-info fas fa-user-secret"></i>&nbsp;<span>Username</span><input type="text" name="edit_username" id="edit_username" placeholder="<?php echo $resultt['USERNAME']; ?>">
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                <i class="icon-info fas fa-lock"></i>&nbsp;<span>Password</span><input type="password" name="edit_password" id="edit_password" placeholder="************">
                </div>
                <div class="upload-info-user" style="margin-top: 1.5em;">
                  <i class="icon-info fas fa-shield-alt"></i>&nbsp;<span>Kode keamanan</span><input type="text" maxlength="5" id="edit_kode" name="edit_kode" placeholder="<?php echo $resultt['KODE_KEAMANAN']; ?>">
                </div>
                <button id="button_edit" class="button-edit" name="edit"><span></span>SELESAI</button>
              </div>
              </form>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function(){
  $('.button-edit').attr('disabled',true);
  $('#formedit').keyup(function(){
      if($('#edit_password').val().length < 1 || $('#edit_nama').val().length < 1 || $('#edit_username').val().length < 1 || $('#edit_kode').val().length < 1)
          $('.button-edit').attr('disabled', true);
      else
          $('.button-edit').attr('disabled',false);
  });
});
    </script>
  </body>
</html>
