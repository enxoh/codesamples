<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
	</head>
	<body>
		<div class="container">
			<?php
				if($_SESSION){
				echo 'Welcome ' . $_SESSION['first_name'];
				echo ' ' . $_SESSION['type'];
				echo ' ' . $_SESSION['username'];
			}
				?>
		</div>

	</body>
</html>