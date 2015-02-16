<!DOCTYPE html>
<html lang="id">
	<head>
		<?php
			$head['title'] = 'SATAMON - Pihak Berwenang: Login';
			$head['css'] = array(
				'login'
			);
			include 'templates/head.php';
		?>
	</head>
	<body>
		
		<div class="box">
			<div class="container-fluid">
				<div class="row">
					<div class="box-left col-sm-6">
						<h1>SATAMON<br><small>Sistem Aduan Taman Online</small></h1>
						<p>Anda akan mengakses halaman pihak berwenang dari <strong>Sistem Aduan Taman Online Pemerintah Kota Bandung</strong>.</p>
						<p>Silahkan masukkan <strong>nama pengguna</strong> dan <strong>kata sandi</strong> untuk dapat mengakses halaman pihak berwenang yang tersedia.</p>
						<hr>
						<p class="copyright"><img class="logo-pemko" src="img/pemko-bandung.png"></p>
						<p class="copyright text-muted">&copy; 2015 <a href="http://bandung.go.id" target="_blank">Pemerintah Kota Bandung</a><br>All rights reserved.</p>
					</div>
					<div class="box-right col-sm-6">
						<h2>Masuk</h2>
						<div id="loginResponse">
						</div>
						<form id="loginForm" action="../backend/auth.php" method="post">
							<div class="form-group">
								<label for="username">Nama pengguna</label>
								<input type="text" class="form-control" id="loginUsername" name="username" placeholder="Nama pengguna" required autofocus>
							</div>
							<div class="form-group">
								<label for="password">Kata kunci</label>
								<input type="password" class="form-control" id="loginPassword" name="password" placeholder="Kata kunci" required>
							</div>
							<button type="submit" class="btn btn-primary">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			$foot['js'] = array(
				'login'
			);
			include 'templates/foot.php';
		?>
	</body>
</html>