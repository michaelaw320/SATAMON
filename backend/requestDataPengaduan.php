<?php
/**
 *	Request Data Pengaduan
 *	Input:
 *		TBD
 *	Output:
 *		JSON
 *		Not Authenticated JSON: {'LoginStatus'=>"NOT_AUTHENTICATED"}
 *		Content: Hasil query mysql
 *	Process:
 *		Query database untuk laporan dan foto sesuai dengan ketentuan
 *		return hasil retrieval kepada client
 */

require 'MYSQL_CREDENTIALS.php';

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
		$sql = "SELECT * FROM `pengaduan`";
		$select = mysqli_query($conn, $sql);
		$result = array();
		while($data = mysqli_fetch_assoc($select)) {
			$result[] = $data;
		}
		
		$data = array("result" => count($result), "data" => $result);
		
		mysqli_close($conn);
		/* JSON Response */
		header('Content-type: application/json');
		echo json_encode($data);
	}
}

?>