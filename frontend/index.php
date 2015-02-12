<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-select.css" rel="stylesheet">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/bootstrap-select.js"></script>
	
	<title>Sistem Aduan Taman Online Kota Bandung - Laporkan!</title>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3 class="text-center">
				Sistem Aduan Taman Online Kota Bandung
			</h3>
			<!--
			<div class="carousel slide" id="carousel-621411">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-621411">
					</li>
					<li data-slide-to="1" data-target="#carousel-621411" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-621411">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="" src="http://lorempixel.com/1600/500/sports/1">
						<div class="carousel-caption">
							<h4>
								Cara mudah membantu Pemkot Bandung #1
							</h4>
							<p>
								Isilah form dengan data-data yang disediakan.
							</p>
						</div>
					</div>
					<div class="item active">
						<img alt="" src="http://lorempixel.com/1600/500/sports/2">
						<div class="carousel-caption">
							<h4>
								Cara mudah membantu Pemkot Bandung #2
							</h4>
							<p>
								Tekan tombol submit untuk mengirimkan pengaduan.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="http://lorempixel.com/1600/500/sports/3">
						<div class="carousel-caption">
							<h4>
								Cara mudah membantu Pemkot Bandung #3
							</h4>
							<p>
								Terima kasih! Anda telah membantu Pemkot Kota Bandung dalam menjaga kenyamanan bersama!
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-621411" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-621411" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			-->
			<form role="form" class="cmxform" id="aduan">
				<div class="form-group">
					 <label for="inputEmail">Alamat E-mail</label><input class="form-control" id="inputEmail1" type="email">
					 <label for="inputTaman">Nama taman</label><input class="form-control" id="inputTaman1" type="text" required>
					 <label for="inputReport">Isi pengaduan</label><input class="form-control" id="inputReport1" type="text" required>
					<label for="inputSelection">Pilih kategori</label><br>
					<select id="inputSelection1" required>
						<option value="" selected="selected" disabled="disabled">Pilih kategori</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
					<br>
					 <label for="inputFile">Upload foto</label>
					 <input id="inputFile1" type="file" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
