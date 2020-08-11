<?php
session_start();
include '../setting/koneksi.php';
  $id = $_SESSION['ID'];
  $username = $_SESSION['USERNAME'];
  $sql = mysql_query("SELECT * FROM user WHERE ID = '$id'");
  $result = mysql_fetch_array($sql);
  $_SESSION['USERNAME'] = $result['USERNAME'];
  $author = $result['USERNAME'];
  $caption = $_POST['capt'];
      $ekstensi_file	= array('png','jpg');
			$nama = $_FILES['imageup']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['imageup']['size'];
			$file_tmp = $_FILES['imageup']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_file) == true){
				if($ukuran < 1044070){
					move_uploaded_file($file_tmp, '../img/'.$nama);
          $query = mysql_query("INSERT INTO photo_upload (AUTHOR,PHOTO,CAPTION,ID_USER) VALUES ('$author','$nama','$caption','$id')");
          if ($query) {
            echo "<meta http-equiv='refresh' content='0; url=index.php' />";
          }else {
            echo "<meta http-equiv='refresh' content='0; url=index.php#upload' />";
          }
				}else{
					echo '<script>alert("UKURAN FILE TERLALU BESAR");</script>';
					echo "<meta http-equiv='refresh' content='0; url=index.php' />";
				}
			}else{
				echo '<script>alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");</script>';
				echo "<meta http-equiv='refresh' content='0; url=index.php' />";
		}
?>
