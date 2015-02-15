<?php
	include 'mysql.php';
	$result = mysql_safe_query('SELECT nama_taman FROM taman');

	if($result) {
		while($row = mysql_fetch_assoc($result)) {
			echo $row['nama_taman']."\n";
		}
	}
?>