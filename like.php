<?php
  include 'setting/koneksi.php';
  $id = $_GET['id'];
  echo $id;
    $sql = mysql_query("UPDATE foto SET LIKES = (LIKES+1) WHERE ID_PHOTO =".$id);
    ?><i class="far fa-heart" id="heart"></i><?php
  if (isset($_POST['share'])) {
    $sql2 = mysql_query();
  }
?>
