<?php
	session_start();
	include '../setting/koneksi.php';
	$nama = $_SESSION['NAMA'];
	$id = $_SESSION['ID'];
	$panggil = mysql_query("SELECT * FROM user WHERE ID = '$id'");
	$resultt = mysql_fetch_array($panggil);
	$_SESSION['FOTO'] = $resultt['FOTO'];
	if (!isset($_SESSION['USERNAME'])) {
		?>
			<script type="text/javascript">window.location.href="../index.php"</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../lightroom/lightbox.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/fontawesome-all.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../lightroom/lightbox.js"></script>
	<script type="text/javascript" src="../js/master.js"></script>
	<script type="text/javascript" src="../js/upload.js"></script>
</head>
<body>
	<section class="sectama">
		<header class="headertama">
			<div class="container-header-tama">
				<div class="logo">
					<button id="menu-hide"><i id="icon-hamburger" class="fas fa-bars" style="font-size: 1.2em;color: #fff;"></i></button>&nbsp;<img src="../img/logo1.png">
				</div>
				<div class="searchf">
					<form class="search" action="index.php" method="post" id="cari">
						<input type="text" class="inputsearch" id="search" name="cari" value="" placeholder="Cari fotografer favoritmu..."><button type="button" class="button" id="src" name="button"><i class="fas fa-search" id="iconsearch"></i></button>
					</form>
				</div>
				<nav class="navtama">
					<ul>
						<li><a href="#upload"><i class="fas fa-upload"></i></a></li>
						<li><a href="#notif"><i class="fas fa-bell"></i></a></li>
						<li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li>
					</ul>
				</nav>
			</div>
		</header>
		<!-- Modal -->
		<div class="modal" id="upload">
			<div class="modal-container">
				<div class="modal-head">
					<i class="fas fa-upload" style="color: #ccc;"></i>Upload Image
					<a href="#"><i style="color: #ccc;" class="fas fa-times"></i></a>
				</div>
					<form class="modal-body" id="formupload" action="upload_foto.php" method="post" enctype="multipart/form-data">
						<label for="capt_upload">Caption*</label>
						<textarea class="capt-upload" id="capt_upload" name="capt" gallerys="3" maxlength="100" style="width: 100%;"></textarea>
							<div class="input-file-container">
	    					<input class="input-file" id="my_file" name="imageup" type="file">
	    					<label tabindex="0" for="my-file" class="input-file-trigger"><i class="fas fa-camera"></i> Select a photo...</label>
	  					</div>
	  					<p class="file-return"></p>
							<div id="keterangan"></div>
							<button class="sub-upload" name="submit_upload" id="button_upload">Upload</button>
					</form>
			</div>
		</div>
		<div class="modal" id="notif">
			<div class="modal-container">
				<div class="modal-head">
					Notification
					<a href="#"><i class="fas fa-times"></i></a>
				</div>
				<div class="modal-body">

				</div>
			</div>
		</div>

		<!--  -->
		<div class="sidebar" id="side">
			<div class="sidebar-head">
				<button class="side-button-hide" id="sidebar-hide"><i id="icon-close" class="fas fa-bars" style="font-size: 1.2em;color: #fff;"></i></button>
			</div>
			<div class="info-side">
				<div class="photo-user">
					<img class="" src="../img/<?php echo $_SESSION['FOTO']; ?>">
				</div>

				<div class="side-name" id="side-name"><?php echo $nama; ?></div>
			</div>
			<hr class="batas" style="">
			<div class="side-content">
				<ul>
					<li><a href="#"><i class="fas fa-users"></i> FORUM</a></li>
					<li><a href="#"><i class="fas fa-images"></i> GALLERY</a></li>
					<li class="sidenav"><a href="#notif"><i class="fas fa-bell"></i> NOTIFICATION</a></li>
					<li class="sidenav"><a href="#upload"><i class="fas fa-upload"></i> UPLOAD</a></li>
					<li class="sidenav"><a href="profile.php"><i class="fas fa-user-circle"></i> PROFILE</a></li>
				</ul>
			</div>
			<hr class="batas" style="">
			<div class="side-content">
				<ul>
					<li><a href="#"><i class="fas fa-phone"></i> CONTACT</a></li>
					<li><a href="#"><i class="fas fa-question-circle"></i> HELP</a></li>
					<li><a href="../logout.php?id=<?php echo $id; ?>">LOGOUT</a></li>
				</ul>
			</div>
		</div>
		<div class="container-section">

<div class="gallery">
	<?php
		include '../setting/koneksi.php';
		$sql = mysql_query("SELECT * FROM photo_upload");

		while ($result = mysql_fetch_array($sql)) {

	?>
	<div class="gallery-item">
		<div class="item-image">
	    <a href="../img/<?php echo $result['PHOTO']; ?>" data-lightbox="image" data-title="<?php echo $result['CAPTION']; ?>"><img class="fototampil" src="../img/<?php echo $result['PHOTO']; ?>" style="width:100%"></a>
			<div class="content-gallery">
				<form class="content-gallery" id="formfoto" method="POST">
					<a href="<?php if($result['AUTHOR'] == $_SESSION['USERNAME']){echo "profile.php";} else { echo "../orang_lain.php?usr=".$result['AUTHOR']; } ?>" class="nameauthor"><?php echo $result['AUTHOR']; ?></a>
					<button type="button" id="<?php echo $result['ID']; ?>" name="love" class="love"><i class="far fa-heart" id="heart"> <?php echo $result['LOVE']; ?></i></button>
					<button type="submit" name="share" class="share"><i class="fas fa-share"></i> share</button>
				</form>

			</div>
		</div>
  </div>
<?php } ?>
</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function () {
         	$('#cari').keyup(function(){
	            if($('#search').val().length < 1){
	                $('.button').find('i').removeClass('fas fa-times').addClass('fas fa-search');
	                $('.button').prop('id','src');
	              }
	            else {
	                $('.button').find('i').removeClass('fas fa-search').addClass('fas fa-times');
	                $('.button').prop('id','clear_search');
	              }


	              if ($('.button').prop('id') == 'src') {
	              	$('.button').click(function () {

	              	});
	              }else{
	              	$('.button').click(function () {
	              		$('#search').val('');
	              		$('.button').find('i').removeClass('fas fa-times').addClass('fas fa-search');
	                	$('.button').prop('id','src');
	              	});
	              }
      		});
		});
	</script>
</body>
</html>
