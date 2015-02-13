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

session_unset();
session_destroy();
?>