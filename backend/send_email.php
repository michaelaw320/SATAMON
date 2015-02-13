<?php
	require 'phpmailer/class.phpmailer.php';
	
	sendMailTo("13512018@std.stei.itb.ac.id","Pasopati",0);
	
	//$status = 0 -> ke admin
	//$status = 1 -> ke user
	
	function konversi_hari($day)
	{
		if ($day == 'Monday')
			return 'Senin';
		else if ($day == 'Tuesday')
			return 'Selasa';
		else if ($day == 'Wednesday')
			return 'Rabu';
		else if ($day == 'Thursday')
			return 'Kamis';
		else if ($day == 'Friday')
			return 'Jumat';
		else if ($day == 'Saturday')
			return 'Sabtu';
		else if ($day == 'Sunday')
			return 'Minggu';
		else
			return 'Error';
	}
	
	function konversi_bulan($month)
	{
		if ($month == 'January')
			return 'Januari';
		else if ($month == 'February')
			return 'Februari';
		else if ($month == 'March')
			return 'Maret';
		else if ($month == 'April')
			return 'April';
		else if ($month == 'May')
			return 'Mei';
		else if ($month == 'June')
			return 'Juni';
		else if ($month == 'July')
			return 'Juli';
		else if ($month == 'August')
			return 'Agustus';
		else if ($month == 'September')
			return 'September';
		else if ($month == 'October')
			return 'Oktober';
		else if ($month == 'November')
			return 'November';
		else if ($month == 'December')
			return 'Desember';
		else
			return 'Error';
	}
	function sendMailTo($mailAddress,$taman,$status)
	{
		date_default_timezone_set("Asia/Jakarta");
		$waktu = "";
		$hour = getdate()['hours'];
		$hari = konversi_hari(date("l"));
		$tanggal = date("j");
		$bulan = konversi_bulan(date("F"));
		$tahun = date("Y");
		$jam = date("H:i:s");
		$jamtanggal = $hari . ", " . $tanggal . " ". $bulan . " " . $tahun . ", " . $jam;
		echo($jamtanggal);
		
		if ($hour >= 0 && $hour <= 11)
			$waktu = "pagi";
		else if ($hour > 11 && $hour < 15)
			$waktu = "siang";
		else if ($hour >= 15 && $hour <= 18)
			$waktu = "sore";
		else
			$waktu = "malam";
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = 'smtp';
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com'; 
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';

		$mail->Username = "satamonbandung@gmail.com";
		$mail->Password = "satamon_berubah";

		$mail->IsHTML(true); // if you are going to send HTML formatted emails
		$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

		$mail->From = "satamonbandung@gmail.com";
		$mail->FromName = "Satamon Bandung";

		$mail->addAddress($mailAddress);
		
		if ($status == 0)
		{
			$mail->Subject = "[Satamon Bandung] [Laporan Harian]";
			
		}
		else
		{
			$mail->Subject = "[Satamon Bandung] [Notifikasi Pengaduan]";
			$mail->Body = 
			"Selamat " .$waktu. ". <br /> <br/>
			Anda telah melaporkan Taman ".$taman. " ke Satamon Bandung. <br/>
			Pengaduan anda akan kami proses segera. <br/> <br/>
			Terima kasih.<br/> <br/>
			-Tim Satamon Bandung-";
		}
		return ($mail->Send());
	}
?>