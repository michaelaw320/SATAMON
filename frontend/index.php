<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-select.css" rel="stylesheet">
	<link href="css/jquery.autocomplete.css" rel="stylesheet">
  
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/bootstrap-select.js"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
	<script>
	$(document).ready(function(){
		$("#inputTaman1").autocomplete("autocomplete.php", {
			selectFirst: true
		});
	});
	</script>
	
	<title>Sistem Aduan Taman Online Kota Bandung - Laporkan!</title>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3 class="text-center"><b>
				<img src="img/satamon.png" height="360" width="360"></img>
			</b></h3>
			<form role="form" class="cmxform" enctype="multipart/form-data" id="aduan" method="post" action="submitaduan.php">
				<div class="form-group">
					 <label for="inputEmail">Alamat E-mail</label><input class="form-control" name="inputEmail1" id="inputEmail1" type="email">
					 <label for="inputTaman">Nama taman</label><input class="form-control" name="inputTaman1" id="inputTaman1" type="text" required>
					 <label for="inputReport">Isi pengaduan</label><input class="form-control" name="inputReport1" id="inputReport1" type="text" required>
					<label for="inputSelection">Pilih kategori</label><br>
					<select name="inputSelection1" required> 
						<option value="" selected="selected" disabled="disabled">Pilih kategori</option>
						<option VALUE="sampah">Sampah</option>
						<option VALUE="sarana">Sarana</option> 
						<option VALUE="kriminal">Kriminal</option>
						<option VALUE="misc">Lain-lain</option> 
					</select>
					<br>
					 <label for="inputFile">Upload foto</label>
					 <input id="inputFile1" name="inputFile1" type="file">
				</div>
				<input type="submit" id="submit" value="submit" name="submit" class="btn btn-default">
			</form>
		</div>
	</div>
</div>
</body>
</html>
