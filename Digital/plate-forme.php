<?php
	session_start();
	if(isset($_SESSION['Id'])){
		try{
			$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
   			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch(PDOException $e){
			echo "erreur:".$e->getMessage();
		}
		$requete=$bdd->prepare('SELECT * FROM établissements WHERE Nom_établissement=?');
		$requete->execute(array($_SESSION['School']));
		$resultat=$requete->fetch();
		$_SESSION['Type_établissement']=$resultat['Type_établissement'];
		$_SESSION['Cursus']=$resultat['Cursus'];
		//$_SESSION['N_etablissemnt']=$resultat['Id'];
		$requete->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<link rel="stylesheet" href="../CSS/plateForme.css">
 	<link rel="shortcut icon" type="image/jpg" href="../img/Logo_RSA.ico"/>
	<title>RSA</title>
</head>
<body>
	<div id="container">
		<header>
			<div id="logo"><img src="../img/Logo_RSA.png"></div>
			<a href="notification.php" title="notification"><button id="notif" ></button></a>
			<a href="parametre.php" title="parametre"><button id="para"></button></a>
			<div id="titre">
				<?php if(isset($_GET['school'])){echo $_GET['school'];}else{echo $_SESSION['School'];} ?>
			</div>
		</header>

		<nav>
			<?php
				$requete=$bdd->prepare("SELECT * FROM établissements WHERE Cursus=?");
				$requete->execute(array($_SESSION['Cursus']));
				$nbRow=$requete->rowCount();

				if($nbRow>0){
					while($resultat=$requete->fetch()){
			?>
					<a href="plate-forme.php?school=<?php echo $resultat['Nom_établissement'];?>">
						<div class="ecole" title="<?php echo $resultat['Type_établissement'];?>">
								<div class="pp"><img src="../img/<?php echo $resultat['Id_etablissement']; ?>.png" alt="erreur"></div><p><?php echo $resultat['Nom_établissement'];
								?></p>
						</div>
					</a>
			<?php
					}
				}else{echo 'Erreur: '.$nbRow.' écoles trouvées';}
				$requete->closeCursor();
			?>

			<!--
			<div class="ecole">
				<a href="plate-forme.php?school=<?php echo $resultat['school']?>">
					<div class="pp"><img src="../img/avatar.png" alt="erreur"></div><p>ecole1</p>
				</a>
			</div>
			-->
		</nav>

		<div id="discussion">
			<div class="message autres"><p>Salut à tous! Dans le cadre de cette fin d'année, nous organisons une cérémonie de fin d'année où nous vous invitons tous à y participer.</p><span>05h00</span></div>
			<div class="message moi"><p>Cool j'aimerai y participer, c'est quand s'il vous plaît?</p><span>05h02</span></div>

			<div class="message autres"><p>C'est ce samedi 31/08/2021</p><span>05h03</span></div>
			<div class="message moi"><p>D'accord! Et quelle heure s'il vous plait?</p><span>05h10</span></div>




			<?php
				$message=$bdd->prepare('SELECT * FROM message  ORDER BY Date ASC');
				$message->execute();
				$nbMessage=$message->rowCount();
				if($nbMessage>0){
					while($resultat=$message->fetch()){

					}
				}else{echo 'Erreur: '.$nbRow.' message trouvé';}
			?>

		</div>

		<footer>
			<form method="post" action="plate-forme.php" enctype="multipart/form-data">
				<textarea name="message" id="message" placeholder="envoyer un message*"></textarea>
				<?php if(!isset($_GET['school']) OR $_GET['school']==$_SESSION['School']){?>
				<input type="file" name="file" id="file">
				<?php  }else if(isset($_GET['school']) AND $_GET['school']!=$_SESSION['School']){} ?>
				<input type="submit" value="Envoyer">
			</form>
		</footer>


		<script type="text/javascript" src="../JS/plate-forme.js"></script>
	</div>
</body>
</html>
<?php
	}else{
		echo 'Erreur de connexion veuillez vous reconnectez';
	}
?>