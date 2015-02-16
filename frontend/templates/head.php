		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">

		<title><?= $head['title'] ?></title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,700,700italic">
		
		<?php foreach ($head['css'] as $name) { ?>
			<link rel="stylesheet" type="text/css" href="css/<?= $name ?>.css">
		<?php } ?>