<?php
  session_start();
  include 'setting/koneksi.php';
    $username = mysql_real_escape_string($_POST['usr']);
    $password = mysql_real_escape_string(md5($_POST['psw']));

    $sql = mysql_query("SELECT * FROM user WHERE USERNAME='$username' and PASSWORD='$password'");
    $result = mysql_fetch_array($sql);
    $row = mysql_num_rows($sql);

    $_SESSION['USERNAME'] = $result['USERNAME'];
    $_SESSION['NAMA'] = $result['NAMA'];
    $_SESSION['ID'] = $result['ID'];
    $id = $_SESSION['ID'];
    $sukses =  "<script>alert('Anda berhasil login sebagai ".$_SESSION['NAMA']."')</script>";

    if (empty($username) || empty($password)) {
      echo "* Username atau password kosong";
    }else {
      if ( $row > 0 ){
        echo "<script>window.location.href='content/index.php'</script>";
      }else{
        echo "* Username atau password anda salah";
      }
    }
?>
