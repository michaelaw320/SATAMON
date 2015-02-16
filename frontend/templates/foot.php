		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<?php foreach ($foot['js'] as $name) { ?>
			<script type="text/javascript" src="js/<?= $name ?>.js"></script>
		<?php } ?>