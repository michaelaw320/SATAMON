<?php
date_default_timezone_set('Asia/Jakarta');
$email = "NULL";
if(!empty($_POST['inputEmail1']))
	$email = $_POST['inputEmail1'];
if(isset($_POST['submit'])){
	include 'mysql.php';
	$query = "SELECT id_taman FROM taman WHERE nama_taman=\"".$_POST['inputTaman1']."\"";
	$id_taman = mysql_fetch_row(mysql_safe_query($query));
	if(!mysql_safe_query('INSERT INTO pengaduan (email_pengaduan,isi_pengaduan,jenis_pengaduan,id_taman) VALUES (%s,%s,%s,%d)', $email, $_POST['inputReport1'], $_POST['inputSelection1'], $id_taman[0]))
		echo mysql_error();

    $name       = $_FILES['inputFile1']['name'];  
    $temp_name  = $_FILES['inputFile1']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = '../backend/uploads/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'uploaded';
            }
        }       
    }  else {
        echo 'please uploaded';
    }
	redirect('index.php');
}

?>