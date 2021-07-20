<?php
	session_start();
	if(isset($_SESSION['Id'])){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<link rel="stylesheet" href="../CSS/plate-forme.css">
 	<link rel="shortcut icon" type="image/jpg" href="../img/icon.jpg"/>
 	
	<title>Plate-forme</title>
</head>
<body>
	<div id="container">
		<header>
			
		</header>
		<nav>
			
		</nav>
		<div id="discusion">
			
		</div>
		<footer>
			
		</footer>
	</div>
	<script type="text/javascript" src="JS/plate-forme.js"></script>
</body>
</html>
<?php
	}else{
		# code...
	}
?>