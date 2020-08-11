<?php
  session_start();
  include 'setting/koneksi.php';
  $id = $_GET['id'];
  $sql = mysql_query("UPDATE user SET STATUS = 'OFFLINE' WHERE ID = '$id'");
  if ($sql) {
    ?>
    <script type="text/javascript">
      alert('Logout berhasil');
    </script>
    <?php
    echo "<meta http-equiv='refresh' content='0; url=index.php' />";
  }
  session_destroy();
?>
