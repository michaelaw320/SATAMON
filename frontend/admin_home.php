<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
		die();
	}
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<?php
			$head['title'] = 'SATAMON - Pihak Berwenang: Login';
			$head['css'] = array(
			);
			include 'templates/head.php';
		?>
	</head>
	<body>
		
		<h1>Hello admin!</h1>
		
		<?php
			$foot['js'] = array(
			);
			include 'templates/foot.php';
		?>
	</body>
</html>