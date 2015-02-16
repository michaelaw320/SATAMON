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

include 'send_email.php';

/*if(session_status() == PHP_SESSION_NONE) {
	// Not Authenticated
	$data = array('LoginStatus'=>"NOT_AUTHENTICATED");
	$send = json_encode($data);
	header('Content-Type: application/json');
	echo $send;
} else {*/
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
			$value = "'". $value. "'";
			$sql = "UPDATE `pengaduan` SET status_pengaduan=$value WHERE id_pengaduan=$key";
			$update = mysqli_query($conn, $sql);
			
			$sql2 = "SELECT email_pengaduan,id_taman FROM `pengaduan` WHERE id_pengaduan=$key";
			$result = mysqli_query($conn, $sql2);
			$row = mysqli_fetch_assoc($result);
			$email_pengaduan = $row["email_pengaduan"];
			
			$id_taman = $row["id_taman"];
			$sql3 = "SELECT nama_taman FROM `taman` WHERE id_taman=$id_taman";
			$result3 = mysqli_query($conn, $sql3);
			$row3 = mysqli_fetch_assoc($result3);
			$nama_taman = $row3["nama_taman"];
			
			if($email_pengaduan != "NULL") {
				sendMailTo($email_pengaduan,$nama_taman,2);
			}
			
		}

		mysqli_close($conn);
		/* JSON Response */
		$data = array("result" => "DONE");
		header('Content-type: application/json');
		echo json_encode($data);
	}
//}
?>