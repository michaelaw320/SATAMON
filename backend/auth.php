<?php
/**
 *	Authentication Module
 *	Input: 
 *		Method: POST
 *		Content: username, password
 *	Output:
 *		JSON
 *		Content: {"LoginStatus":"SUCCESS/FAIL"}
 *	Process:
 *		Compares the username and password sent by client with hardcoded credentials
 *		If auth successful, start session, return JSON with success flag
 *		Else return JSON with fail flag
*/

/* Hardcoded Credentials */
$admin_username = "admin";
$admin_password = "admin";

$username = $_POST['username'];
$password = $_POST['password'];

if($username == $admin_username && $password == $admin_password) {
	//stub for success login
	session_start();
	$_SESSION['username'] = $admin_username;
	$data = array('LoginStatus'=>"SUCCESS");
	$send = json_encode($data);
	header('Content-Type: application/json');
	echo $send;
} else {
	//stub for false login
	$data = array('LoginStatus'=>"FAIL");
	$send = json_encode($data);
	header('Content-Type: application/json');
	echo $send;
}
?>