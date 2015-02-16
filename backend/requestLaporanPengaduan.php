<?php
/**
 *	Request Laporan Pengaduan
 *	Input:
 *		TBD
 *	Output:
 *		JSON
 *		Content: TBD
 *	Process:
 *		Masih coba coba, ini masih ngirim seluruh database belom diselect berdasarkan hari, TBD
 */

require 'MYSQL_CREDENTIALS.php';

include 'send_email.php';

//if(session_status() == PHP_SESSION_NONE) {
	/* Not Authenticated */

//} else {
	/* Process Request */
	$conn = mysqli_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		/* Connection Successful */
		$sql = "SELECT nama_taman FROM pengaduan NATURAL JOIN taman";
		$select = mysqli_query($conn, $sql);
		$result = array();
		while($data = mysqli_fetch_assoc($select)) {
			$result[] = $data["nama_taman"];
		}

		mysqli_close($conn);

		sendMailTo("13512046@std.stei.itb.ac.id",$result,0);
		
		/* JSON Response */
		header('Content-type: application/json');
		echo json_encode($data);
		
	}
	
//}
	
?>