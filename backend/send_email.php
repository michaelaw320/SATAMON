<?php
	require 'phpmailer/class.phpmailer.php';
	
	$tam_ = array
	(	
		array ('Pasopati','Kriminal'),
		array ('Pasopati','Misc'),
		array ('Jomblo','Kriminal')
	);
	/* Contoh penggunaan fungsi sendMailTo ke Admin sbg Laporan  Harian*/
	//$tam = array('pasopati','pasopati','pret','pret','pasopati','dung');
	sendMailTo("13512018@std.stei.itb.ac.id",$tam_,0);
	
	/* Contoh penggunaan fungsi sendMailTo ke Masyarakat sbg Notifikasi Pengaduan  */
	//sendMailTo("13512018@std.stei.itb.ac.id",'pasopati',1);
	
	/* Contoh penggunaan fungsi sendMailTo ke Masyarakat sbg Notifikasi Perubahan Status Pengaduan */
	//sendMailTo("13512018@std.stei.itb.ac.id",'pasopati',2);
	
	//$status = 0 -> ke admin
	//$status = 1 -> ke user, bentuk notif awal untuk pengaduan
	//$status = 2 -> ke user, bentuk notif bila pengaduan sudah dirubah statusnya ke "telah diproses"
	
	
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
		$time = $hari . ", " . $tanggal . " ". $bulan . " " . $tahun;
		
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
		
		if ($status == 0) // admin
		{
			$mail->Subject = "[Satamon Bandung] [Laporan Harian] "."[".$time."]";
		
			$all_taman = array
			(
				array('Pasopati','Kriminal',0),
				array('Pasopati','Sampah',0),
				array('Pasopati','Sarana',0),
				array('Pasopati','Misc',0),
				
				array('Jomblo','Kriminal',0),
				array('Jomblo','Sampah',0),
				array('Jomblo','Sarana',0),
				array('Jomblo','Misc',0),
				
				array('Kota','Kriminal',0),
				array('Kota','Sampah',0),
				array('Kota','Sarana',0),
				array('Kota','Misc',0)
			);
			
			$total_laporan = count($taman);
			
			foreach($taman as $tmn)
			{
				foreach ($all_taman as &$tam)
				{
					if (($tam[0] == $tmn[0]) && ($tam[1] == $tmn[1]))
					{
						$tam[2]++;
						
					}
					else
					{
						// inputan asumsikan benar
					}
				}
			}
			
			$body = 
			'
				<table border = "1"> 
					<tr>
						<td rowspan="2"> Nama Taman </td>
						<td colspan="4"> Kategori</td>
						<td rowspan="2"> Jumlah Laporan </td>
					</tr>
					<tr>
						<td> Kriminal </td>
						<td> Sampah </td>
						<td> Sarana </td>
						<td> Misc </td>
					</tr>
			';
			$i = 0;
			$counter = 0;
			$kategori = array
			(
				'Kriminal' => 0,
				'Sampah' => 0,
				'Sarana' => 0,
				'Misc' => 0
			);
			
			foreach ($all_taman as &$tm)
			{
				if ($i % 4 == 0)
				{
					$body .= '<tr> <td>' .$tm[0] . '</td>';
				}
				$body.='<td>' . $tm[2] .'</td>';
				$counter = $counter + $tm[2];
				
				if ($tm[2] > 0)
					$kategori[$tm[1]]++;
				
				if (($i+1) % 4 == 0)
				{
					$body.='<td>' . $counter . '</td> </tr>';
					$counter = 0;
				}
				$i++;
			}
			
			$body .= '<tr> <td> Jumlah Laporan </td>';
			foreach ($kategori as &$kat)
			{
				$body.='<td>'. $kat.'</td>';
			}
			$body.= '<td>'.$total_laporan.'</td> </tr>';
			echo $body;
			$mail->Body = $body;
		}
		else if ($status == 1) // masyarakat - notifikasi pengaduan awal
		{
			$mail->Subject = "[Satamon Bandung] [Notifikasi Pengaduan]";
			$mail->Body = 
			"Selamat " .$waktu. ". <br /> <br/>
			Terima kasih atas partisipasi Anda. <br/>
			Anda telah melaporkan Taman ".$taman. " ke Satamon Bandung. <br/>
			Pengaduan Anda akan kami proses segera. <br/> <br/> <br/> <br/>
			<br/>
			-Tim Satamon Bandung-";
		}
		else if ($status == 2) // masyarakat - notifikasi perubahan status pengaduan
		{
			$mail->Subject = "[Satamon Bandung] [Notifikasi Pengaduan]";
			$mail->Body = 
			"Selamat " .$waktu. ". <br/> <br/>
			Laporan anda pada Taman ".$taman." sudah kami proses. <br/>
			Terimakasih sudah melaporkannya kepada kami. <br/>
			Semoga anda tetap berpartisipasi aktif dalam menjaga taman-taman di kota Bandung. <br/>
			Jangan segan-segan untuk segera melaporkan kembali ke Satamon Bandung bila Anda menemukan Taman yang bermasalah. <br/> <br/> <br/> <br/>
			Regards, <br/>
			-Tim Satamon Bandung-
			";
		}
		return ($mail->Send());
	}
?>