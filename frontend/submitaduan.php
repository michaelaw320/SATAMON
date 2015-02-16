<?php
date_default_timezone_set('Asia/Jakarta');
$email = "NULL";
if(!empty($_POST['inputEmail1']))
	$email = $_POST['inputEmail1'];
if(isset($_POST['submit'])){
	include 'mysql.php';
	
	/* database taman */
	$query = "SELECT id_taman FROM taman WHERE nama_taman=\"".$_POST['inputTaman1']."\"";
	$id_taman = mysql_fetch_row(mysql_safe_query($query));
	if(!mysql_safe_query('INSERT INTO pengaduan (email_pengaduan,isi_pengaduan,jenis_pengaduan,id_taman) VALUES (%s,%s,%s,%d)', $email, $_POST['inputReport1'], $_POST['inputSelection1'], $id_taman[0]))
		echo mysql_error();

	/* upload gambar */
    $name       = $_FILES['inputFile1']['name'];  
    $temp_name  = $_FILES['inputFile1']['tmp_name'];  
	$detectedType = image_type_to_extension(exif_imagetype($_FILES['inputFile1']['tmp_name']),false);
	$detectedSize = $_FILES['inputFile1']['size'];
    if(isset($name)){
        if(!empty($name)){      
            $location = '../backend/uploads/';
			$int = 0;
			while (file_exists($location.$name)) {
				$path_parts = pathinfo($name);
				$name = $path_parts['filename']."_".$int.".".$path_parts['extension'];
				$int++;
			}
			if(move_uploaded_file($temp_name, $location.$name)){
				echo 'uploaded';
			}
        }       
    }
	
	/* database gambar */
	$url_foto = "http://localhost/SATAMON/backend/".$name;
	
	$id_pengaduan = mysql_insert_id();
	$query = "INSERT INTO foto(id_pengaduan,nama_foto,url_foto,jenis_foto,ukuran_foto) VALUES (".$id_pengaduan.",\"".$name."\",\"".$url_foto."\",\"".$detectedType."\",".$detectedSize.")";

	if(!mysql_safe_query($query))
		echo mysql_error();
	
	redirect('index.php');
}

?>