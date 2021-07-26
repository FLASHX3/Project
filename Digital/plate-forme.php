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
 	<link rel="stylesheet" href="../CSS/plateForme.css">
 	<link rel="shortcut icon" type="image/jpg" href="../img/icon.ico"/>
	<title>RSA</title>
</head>
<body>
	<div id="container">
		<header>
			RSA<br>
			<a href="notification.php"><button id="notif" >Notification</button></a><a href="parametre.php"><button id="para">Parametre</button></a>
		</header>

		<nav>
			<?php
				try{
					$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
      				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      				$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				}
				catch(PDOException $e){
					echo "erreur:".$e->getMessage();
				}

				$requete=$bdd->prepare("SELECT * FROM établissements");
				$requete->execute();
				$nbRow=$requete->rowCount();

				if($nbRow>0){
					while($resultat=$requete->fetch()){
			?>
						<div class="ecole" title="<?php echo $resultat['Type_établissement'];?>">
							<div class="pp"><img src="../img/<?php echo $resultat['Id_etablissement']; ?>.png" alt="erreur"></div><p><?php echo $resultat['Nom_établissement'];
							?></p>
						</div>
			<?php
					}
				}else{echo 'erreur '.$nbRow;}
			?>

			<!--
			<div class="ecole">
				<div class="pp"><img src="../img/avatar.png" alt="erreur"></div><p>ecole1</p>
			</div>
			-->
		</nav>

		<div id="discussion">
			<div class="message autres"><p>Salut à tous! Dans le cadre de cette fin d'année, nous organisons une cérémonie de fin d'année où nous vous invitons tous à y participer.</p><span>05h00</span></div>
			<div class="message moi"><p>Cool j'aimerai y participer, c'est quand s'il vous plaît?</p><span>05h02</span></div>

			<div class="message autres"><p>C'est ce samedi 31/08/2021</p><span>05h03</span></div>
			<div class="message moi"><p>D'accord! Et quelle heure s'il vous plait?</p><span>05h10</span></div>




			<?php
				$message=$bdd->prepare('SELECT * FROM message ORDER BY Date ASC');
				$message->execute();
				$nbMessage=$message->rowCount();
				if($nbMessage>0){
					while($resultat=$message->fetch()){

					}
				}
			?>

		</div>

		<footer>
			<form method="post" action="message.php" enctype="multipart/form-data">
				<textarea name="message" id="message" placeholder="envoyer un message*"></textarea>
				<input type="file" name="file" id="file">
				<input type="submit" value="Envoyer">
			</form>
		</footer>
		<script type="text/javascript" src="../JS/plate-forme.js"></script>
	</div>
</body>
</html>
<?php
	}else{
		echo 'gh';
	}
?>