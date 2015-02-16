<?php
/**
 *	Ubah Status Pengaduan
 *	Input:
 *		Method: POST
 *		Content: JSON List of selected id to be updated and its value {id:value, id:value, id:value, ...} pair
 *					id -> id laporan
 *					value -> diterima, diproses, atau selesai
 *	Output:
 *		JSON
 *		Not Authenticated JSON: {'LoginStatus':'NOT_AUTHENTICATED'}
 *		Content: {'result' : 'DONE'}
 *	Process:
 *		Ubah database menurut permintaan frontend
 *		Lalu kirim email individual kepada pelapor sesuai yang tersimpan di basis data
 */

require 'MYSQL_CREDENTIALS.php';

//TODO Masukin fungsi mailer kesini

if(session_status() == PHP_SESSION_NONE) {
	/* Not Authenticated */
	$data = array('LoginStatus'=>"NOT_AUTHENTICATED");
	$send = json_encode($data);
	header('Content-Type: application/json');
	echo $send;
} else {
	/* Process Request */
	$conn = mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		/* Connection Successful */
		$json = file_get_contents('php://input');
		$data = json_decode($json,true);
		
		foreach($data as $key => $value) {
			//$key as id laporan
			//$value itu status laporan
			//TODO email ke masyarakat yang status pengaduannya diubah, tony modules go here
			// algoritma kasar mailer, query ke basisdata ambil email yang sesuai dengan id nya	
			// hati hati penanganan email NULL	
			$value = "'". $value. "'";
			$sql = "UPDATE `pengaduan` SET status_pengaduan=$value WHERE id_pengaduan=$key";
			$update = mysqli_query($conn, $sql);
		}

		mysqli_close($conn);
		/* JSON Response */
		$data = array("result" => "DONE");
		header('Content-type: application/json');
		echo json_encode($data);
	}
}
?>