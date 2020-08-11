<?php
	include 'setting/koneksi.php';

	$sql = mysql_query("SELECT * FROM foto");
	$result = mysql_fetch_array($sql);
	if (mysql_num_rows($sql) > 0) {
		
		echo "<i class='far fa-heart' id='heart'> ".$result['LIKES']."</i>";
	}

?>
