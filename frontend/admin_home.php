<?php
	require 'admin_auth.php';
	$id = 'home';
	$name = 'Beranda';
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<?php
			$head['title'] = 'SATAMON - Pihak Berwenang: ' . $name;
			$head['css'] = array(
			);
			include 'templates/head.php';
		?>
	</head>
	<body>
	
		<?php
			$admin_navbar['navbar_active'] = $id;
			include 'templates/admin_navbar.php';
		?>
		
		<h1>Beranda!</h1>
		
		<?php
			$foot['js'] = array(
			);
			include 'templates/foot.php';
		?>
	</body>
</html>