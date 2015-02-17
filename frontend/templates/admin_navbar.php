<?php
	$admin_navbar['navbar'] = array(
		"ubah_status" => "Ubah Status"
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
			<a class="navbar-brand" href="#">SATAMON</a>
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
				<li><a class="btn btn-default navbar-btn" href="../backend/logout.php">Keluar</a></li>
			</ul>
		</div>
	</div>
</nav>