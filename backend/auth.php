<?php
$username = $_POST['username'];
$password = $_POST['password'];

$admin_username = "admin";
$admin_password = "admin";

if($username == $admin_username && $password == $admin_password) {
	//stub for success login
	session_start();
} else {
	//stub for false login
	echo 'Tai';
}
?>