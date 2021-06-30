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
 	<script type="text/javascript" src="JS/plate-forme.js"></script>
	<title>Plate-forme</title>
</head>
<body>

</body>
</html>
<?php
	}else{
		# code...
	}
?>