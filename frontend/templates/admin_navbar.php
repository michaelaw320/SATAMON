<?php
	$admin_navbar['navbar'] = array(
		"home" => "Beranda",
		"ubah_status" => "Ubah Status",
		"daftar_pengaduan" => "Daftar Pengaduan",
		"laporan_pengaduan" => "Laporan Pengaduan"
	);
?>
<nav class="navbar navbar-static-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#adminNavbar">
				<span class="sr-only">Hidupkan navigasi</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin_home.php">SATAMON</a>
		</div>
		
		<div class="collapse navbar-collapse" id="adminNavbar">
			<ul class="nav navbar-nav">
				<?php foreach ($admin_navbar['navbar'] as $key => $value) { ?>
					<li <?= $key == $admin_navbar['navbar_active'] ? 'class="active"' : '' ?>>
						<a href="admin_<?= $key ?>.php"><?= $value ?></a>
					</li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../backend/logout.php">Keluar</a></li>
			</ul>
		</div>
	</div>
</nav>