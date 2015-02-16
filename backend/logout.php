<?php
/**
 *	Logout Module
 *	Input:
 *		N/A
 *	Output:
 *		N/A
 *	Process:
 *		Unset and destroy the session
 */

session_start();

session_unset();

session_destroy();

if (isset($_REQUEST['r'])) {
	header('Location: ' . $_REQUEST['r']);
} else {
	header('Location: ../frontend/login.php');
}
die();