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
		/*$json = file_get_contents('php://input');
		var_dump($json);
		$data = json_decode($json,true);
		var_dump($data);

		foreach($data as $key => $value) {
			//$key as id laporan
			//$value itu status laporan
			$value = "'". $value. "'";
			$sql = "UPDATE `pengaduan` SET status_pengaduan=$value WHERE id_pengaduan=$key";
			$update = mysqli_query($conn, $sql);
			
			$sql2 = "SELECT email_pengaduan,nama_taman FROM pengaduan NATURAL JOIN taman WHERE id_pengaduan=$key";
			$result = mysqli_query($conn, $sql2);
			$row = mysqli_fetch_assoc($result);
			$email_pengaduan = $row["email_pengaduan"];
			$nama_taman = $row["nama_taman"];
			
			if($email_pengaduan != "NULL") {
				sendMailTo($email_pengaduan,$nama_taman,2);
			}
		}*/
		if(isset($_POST['Kirim'])){
			if(isset($_POST['key']) && isset($_POST['proses'])){
				if(($_POST['key'] != "") || ($_POST['proses'] != "")){
					$key = $_POST['key'];
					$proses = $_POST['proses'];
					for($i = 0; $i < sizeof($key); $i++){
						$sql = "UPDATE `pengaduan` SET status_pengaduan='$proses' WHERE id_pengaduan=$key[$i]";
						$update = mysqli_query($conn, $sql);
					}

					mysqli_close($conn);
					header("location:../frontend/admin_ubah_status.php");
				}
				else{
					echo "Masih ada form yang masih kosongg";
				}
			}
			else{
				echo "Masih ada form yang masih kosong";
			}
		}
		/* JSON Response */
		/*$data = array("result" => "DONE");
		header('Content-type: application/json');
		echo json_encode($data);*/
	}
//}
?>