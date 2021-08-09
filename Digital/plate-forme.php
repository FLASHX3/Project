<?php
	session_start();
	if(isset($_SESSION['Id']) AND $_SESSION['Id']!=0){
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
		$requete->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<link rel="stylesheet" href="../CSS/plateForme.css">
 	<link rel="shortcut icon" type="image/ico" href="../img/Logo_RSA.ico"/>
 	<script type='text/javascript' src="../JS/plateforme.js"></script>
	<title>RSA</title>
</head>
<body>
	<div id="container">
		<header>
			<div id="logo"><img src="../img/Logo_RSA.png"></div>
			<a href="notification.php" title="notification"><button id="notif" ></button></a>
			<a href="parametre.php" title="paramètre"><button id="para"></button></a>
			<a href="deconnection.php" title="se déconnecter"><button id="deconnect"></button></a>
			<?php
				if($_SESSION['Type_user']=="admin"){
			?>
				<a href="ajouter.php?a=false" title="supprimer une école"><button id="delete"></button></a>
				<a href="ajouter.php?a=true" title="ajouter une école"><button id="ajout"></button></a>
			<?php
				}
			?>

			<div id="titre">
				<?php
					if(isset($_GET['school']) AND $_GET['school']!=""){
						 $_SESSION['ecole_visé']=$_GET['school'];
					}else if(!isset($_GET['school'])){
						if(isset($_SESSION['ecole_visé'])){
							$_SESSION['ecole_visé']=$_SESSION['ecole_visé'];
						}else if(!isset($_SESSION['ecole_visé'])){
							$_SESSION['ecole_visé']=$_SESSION['School'];
						}
					}
					echo $_SESSION['ecole_visé'];
				?>
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
						<div class="ecole" <?php if($_SESSION['ecole_visé']==$resultat['Nom_établissement']){echo 'id="select"';}?> title="<?php echo $resultat['Type_établissement'];?>">
							<div class="pp"><img src="../img/ecole/<?php echo $resultat['Nom_établissement']; ?>.png" alt="erreur"></div>
							<p><?php echo $resultat['Nom_établissement'];?></p>
						</div>
					</a>
			<?php
					}
				}else{echo 'Erreur: '.$nbRow.' écoles trouvées';}
				$requete->closeCursor();
			?>
		</nav>

		<div id="discussion">
			<?php
				$message=$bdd->prepare("SELECT Id,Auteur,Contenu,DATE_FORMAT(Date, '%d/%m/%Y %Hh%imin%ss') AS Heure FROM message WHERE Ecole_visé=?");
				$message->execute(array($_SESSION['ecole_visé']));
				$nbMessage=$message->rowCount();
				if($nbMessage>0){
					while($resultat=$message->fetch()){
			?>
					<div <?php if($resultat['Auteur']==$_SESSION['User_name']){echo 'class="me"';} ?> >
						<div class="message <?php if($resultat['Auteur']==$_SESSION['User_name']){echo 'moi';}else{echo 'autres';} ?> ">
							<p class="auteur"><?php echo $resultat['Auteur']; ?></p>
							<p>
								<?php echo $resultat['Contenu']; ?>
							</p>
							<span><?php echo $resultat['Heure']; ?></span>
						</div>
					</div>
			<?php
					}
				}else{
					echo 'Erreur '.$nbMessage.' trouvés';
				}
			?>
		</div>

		<footer>
			<form method="post" action="message.php?school=<?php echo $_SESSION['ecole_visé']; ?>" enctype="multipart/form-data" onsubmit="return verif(this);">
				<div class="ele">
					<textarea name="message" id="message" placeholder="envoyer un message*"></textarea>
					<button type="submit" id="Envoyer"></button>
				</div>
				<?php if(!isset($_GET['school']) OR $_GET['school']==$_SESSION['School']){?>
				<div class="ele">
					<input type="file" name="file" id="file" title="ajouter un fichier" onchange="verif_doc(this);">
				</div>
				<?php  }else if(isset($_GET['school']) AND $_GET['school']!=$_SESSION['School']){} ?>
			</form>
		</footer>
		<?php
			if(isset($_GET['err_file'])){
		?>
				<script type='text/javascript'>alert("<?php echo $_GET['err_file']; ?>");</script>
		<?php
			}
		?>
	</div>
</body>
</html>
<?php
	}else{
		echo 'Erreur de connexion veuillez vous reconnecter';
	}
?>