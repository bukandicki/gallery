<?php
  include 'setting/koneksi.php';
  $nama_lengkap = $_POST['nm'];
  $telepon = $_POST['tel'];
  $jenis_kelamin = $_POST['jenkel'];
  $tanggal_lahir = $_POST['dat'];
  $username = $_POST['usr'];
  $password = md5($_POST['psw']);
  $kode = $_POST['kdk'];

  if (empty($nama_lengkap) || empty($username) || empty($password) || empty($tanggal_lahir) || empty($telepon) || empty($kode)) {
    echo "* Form anda belum selesai diisi";
    echo $nama_lengkap;
  } else {
  	if (!(int)$jenis_kelamin) {
    echo "* Pilih Gender Anda";
	  }

	  if ($jenis_kelamin == '1') {
	    $jenis_kelamin = 'L';
	  }else {
	    $jenis_kelamin = 'P';
	  }

	  $seleksi = mysql_query("SELECT USERNAME FROM user WHERE USERNAME = '$username'");
	  $result = mysql_num_rows($seleksi);

	  if ($result > 1) {
	    echo "* Gagal, Username Yang Anda Masukan Telah Terdaftar";
	  }else {
	  	$input = mysql_query("INSERT INTO user (NAMA,TANGGAL_LAHIR,JENIS_KELAMIN,USERNAME,PASSWORD,TELEPON,KODE_KEAMANAN) VALUES ('$nama_lengkap','$tanggal_lahir','$jenis_kelamin','$username','$password','$telepon','$kode')");
	    if ($input) {
	    	echo "<span style='color: green;'>Pendaftaran Anda Sukses</span>";
	    }else{
	    	echo "* Pendaftaran Anda Gagal";
	    }
	}
  }
?>
