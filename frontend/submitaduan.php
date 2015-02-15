<?php
// post_add.php
date_default_timezone_set('Asia/Jakarta');
if(!empty($_POST)) {
	include 'mysql.php';
	if(!mysql_safe_query('INSERT INTO pengaduan (email_pengaduan,isi_pengaduan,jenis_pengaduan,id_taman) VALUES (%s,%s,%s,%d)', $_POST['inputEmail1'], $_POST['inputReport1'], $_POST['inputSelection1'], 1))
		echo mysql_error();
	redirect('index.php');
}
?>