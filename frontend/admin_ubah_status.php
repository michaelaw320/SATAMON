<?php
	require 'admin_auth.php';
	$id = 'ubah_status';
	$name = 'Ubah Status';
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
			include 'mysql.php';
		?>
		
		<h1>Ubah Status</h1>
		<?php
			$query = mysql_query("SELECT foto.url_foto, pengaduan.id_pengaduan, taman.nama_taman, pengaduan.email_pengaduan, pengaduan.isi_pengaduan, pengaduan.waktu_pengaduan, pengaduan.status_pengaduan FROM (pengaduan NATURAL JOIN taman) LEFT JOIN foto ON foto.id_pengaduan = pengaduan.id_pengaduan") or die ("Query salah");

			$isIsi = intval(mysql_num_rows($query));
			if($isIsi == 0){ // tidak ada isinya
				echo "Tidak ada pengaduan!<br>";
			}
			else{
		?>
				<form ACTION="../backend/ubahStatus.php" METHOD="POST">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<tr>
								<td> </td>
								<td>No</td>
								<td>ID Pengaduan</td>
								<td>Nama Taman</td>
								<td>Email Pengadu</td>
								<td>Foto Pengaduan</td>
								<td>Isi Pengaduan</td>
								<td>Waktu Pengaduan</td>
								<td>Status Pengaduan</td>
							</tr>
							<?php
								$no = 1;
								while($row = mysql_fetch_object($query)){
									$id_pengaduan = $row->id_pengaduan;
									$email_pengaduan = $row->email_pengaduan;
									$foto = $row->url_foto;
									$isi_pengaduan = $row->isi_pengaduan; 
									$nama_taman = $row->nama_taman;
									$waktu_pengaduan = $row->waktu_pengaduan;
									if($row->status_pengaduan == "diproses"){
										$status_pengaduan = "Sedang diproses";
									}
									else if($row->status_pengaduan == "selesai"){
										$status_pengaduan = "Sudah diproses";
									}
									else if($row->status_pengaduan == "diterima"){
										$status_pengaduan = "Diterima";
									}
									else{
										$status_pengaduan = $row->status_pengaduan;
									}
									echo("
										<tr>
											<td><input type=checkbox name=key[] value=$id_pengaduan></td>
											<td>$no</td>
											<td>$id_pengaduan</td>
											<td>$nama_taman</td>
											<td>$email_pengaduan</td>
											<td><img src=$foto class=img-responsive></td>
											<td>$isi_pengaduan</td>
											<td>$waktu_pengaduan</td>
											<td>$status_pengaduan</td>
										</tr>
									");
									$no++;
								}
							?>
						</table>
					</div>
					<p class="text-center">
						Jumlah total pengaduan: <?php echo "$isIsi"; ?>
						<br><br>
						<?php
						echo("<select name=proses>");
							echo("<option selected>Lakukan aksi terhadap pengaduan</option>");
							echo("<option value=diproses>Ubah status menjadi sedang diproses</option>");
							echo("<option value=selesai>Ubah status menjadi sudah diproses</option>");
						echo("</select>");
						echo("<button class=btn btn-default type=submit name=Kirim value=Kirim>Konfirm Aksi</button>");
						?>
					</p>
				</form>
			<?php
			}
		?>

		<?php
			$foot['js'] = array(
			);
			include 'templates/foot.php';
		?>
	</body>
</html>