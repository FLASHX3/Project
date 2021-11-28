<?php
	session_start();
	//header("refresh:30");
	require_once("../../../parametre.inc");
	if(isset($_SESSION['Id']) AND $_SESSION['Id']!=0 AND !empty($_SESSION['Id'])){
		try{
			$bdd= new PDO("mysql:host=$serveur;dbname=$database1;charset=utf8",$user,$user_password);
   			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch(PDOException $e){
			echo "erreur:".$e->getMessage();
		}

		$requete=$bdd->prepare('SELECT Type_établissement,Cursus FROM établissements WHERE Nom_établissement=?');
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
 	<!--<meta http-equiv="refresh" content="60">-->
 	<link rel="stylesheet" href="../CSS/plateForme.css">
 	<link rel="shortcut icon" type="image/ico" href="../img/Logo_RSA.ico"/>
 	<script type="text/javascript">
 		var b=false; //verificateur de document
		function toggleDisplay()
		{
			elmt=document.getElementById('para-zone');
			/*if(typeof elmt == "string")
				elmt = document.getElementById(elmt);*/
			if(elmt.style.visibility == "hidden")
				elmt.style.visibility = "visible";
			else
				elmt.style.visibility = "hidden";
		}
		function active(message){
			var envoi=document.getElementById('Envoyer');

			if(b==true){
				envoi.style.visibility="visible";
			}else{
				if(message.value==""){
					envoi.style.visibility="hidden";
				}else{
					envoi.style.visibility="visible";
				}
			}
		}
		function verif_doc(doc){
			document.getElementById('Envoyer').style.visibility="visible";
			b=true;
			return b;
		}
		/*function verif_doc(doc){
			var nom_fichier=doc.files[0].name;
			var taille_fichier=doc.files[0].size;
			var type_fichier=doc.files[0].type;

			var pdf="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
			var txt="text/plain";
			var pptx="application/vnd.openxmlformats-officedocument.presentationml.presentation";
			var xlsx="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
			var docx="application/vdn.openxmlformats-officedocument.wordprocessingml.document";
			var zip="application/x-zip-compressed";

			if(type_fichier=="image/jpg" || type_fichier=="image/jpeg" || type_fichier=="image/png" || type_fichier==txt || type_fichier=pdf || type_fichier==docx || type_fichier==xlsx || type_fichier=pptx || type_fichier==zip){
				if(taille_fichier<20971520){  //image inférieure à 20mo
					a=true;
					document.getElementById('Envoyer').style.visibility="visible";
				}
				else{
					a=false;
					document.getElementById('Envoyer').style.visibility="hidden";
					alert("This file is too weighty");
				}
			}
			else{
				a=false;
				document.getElementById('Envoyer').style.visibility="hidden";
				alert("Only jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx,ptt,pptx,zip");
			}
			return a;
		}*/
	</script>
	<title>RSA</title>
</head>
<body>
	<div id="container">
		<header>
			<div id="logo"><img src="../img/Logo_RSA.png"></div>
			<a href="notification.php" title="notification"><button id="notif" ></button></a>
			<a href="#" title="paramètre"><button id="para" onclick="toggleDisplay()"></button></a>
			<a href="deconnection.php" title="se déconnecter"><button id="deconnect"></button></a>
			<?php
				if($_SESSION['Type_user']=="admin"){
			?>
				<a href="ajouter.php?a=false" title="supprimer une école"><button id="delete"></button></a>
				<a href="ajouter.php?a=true" title="ajouter une école"><button id="ajout"></button></a>
			<?php
				}
			?>
			<div class="titre">
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
			</div>
		</header>

		<aside id="para-zone">
			<p><a href="" title="Modifier mon profil">Modifier mon profil</a></p>
			<p><a href="" title="Changer de thème">Modifier le thème</a></p>
			<p><a href="" title="Supprimer mon compte">Supprimer mon compte</a></p>
			<p><a href="" title="Voir les media du groupe">Media du groupe</a></p>
		</aside>

		<nav>
			<?php
				$requete=$bdd->prepare("SELECT * FROM établissements WHERE Cursus=? ORDER BY Nom_établissement");
				$requete->execute(array($_SESSION['Cursus']));
				$nbRow=$requete->rowCount();

				if($nbRow>0){
					while($resultat=$requete->fetch()){
			?>
					<a href="plate-forme.php?school=<?php echo $resultat['Nom_établissement'];?>#derniermessage">
						<div class="ecole" <?php if($_SESSION['ecole_visé']==$resultat['Nom_établissement']){echo 'id="select"';}?> title="<?php echo $resultat['Type_établissement'];?>">
							<div class="pp"><img src="../img/ecole/<?php echo $resultat['Nom_établissement']; ?>.png" alt="erreur"></div>
							<!--<span class="notification">13</span>-->
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
				$message=$bdd->prepare("SELECT Id,Auteur,Contenu,Date,DATE_FORMAT(Date, '%Hh%imin') AS Heure FROM message WHERE Ecole_visé=?");
				$message->execute(array($_SESSION['ecole_visé']));
				$nbMessage=$message->rowCount();

				$max=$bdd->prepare("SELECT MAX(Date) AS Max FROM `message` WHERE `Ecole_visé`=?");
				$max->execute(array($_SESSION['ecole_visé']));
				$max_date=$max->fetch();

				if($nbMessage>0){
					while($resultat=$message->fetch()){
			?>
					<div <?php if($resultat['Auteur']==$_SESSION['User_name']){echo 'class="me"';} ?> >
						<div class="message <?php if($resultat['Auteur']==$_SESSION['User_name']){echo 'moi';}else{echo 'autres';} ?> ">
							<p class="auteur"><?php echo $resultat['Auteur']; ?></p>
							<p <?php if($resultat['Date']==$max_date['Max']){echo 'id="derniermessage"';} ?> >
								<?php 
									if(preg_match("#\.[jpg|jpeg|png|doc|docx|pdf|xls|xlsx|zip|txt|ppt|pptx]#", $resultat['Contenu'])){
										$resultat['Contenu']='<a href="../Document/'.$resultat['Contenu'].'" target="blank">'.$resultat['Contenu'].'</a>';
									}
									echo nl2br($resultat['Contenu']);
								?>
							</p>
							<span><?php echo $resultat['Heure']; ?></span>
						</div>
					</div>
			<?php
					}
				}else{
					echo "<div class='nan'>Aucun message</div>";
				}
				$max->closeCursor();
				$message->closeCursor();
			?>
		</div>

		<footer>
			<form method="post" action="message.php?school=<?php echo $_SESSION['ecole_visé']; ?>" enctype="multipart/form-data">
				<div class="ele">
					<textarea name="message" id="message" oninput="active(this);" placeholder="envoyer un message*"></textarea>
					<button type="submit" id="Envoyer"></button>
				</div>
				<?php if(!isset($_GET['school']) OR $_GET['school']==$_SESSION['School']){?>
				<div class="ele">
					<input type="file" name="file" id="file" title="ajouter un fichier" onchange="return verif_doc();">
				</div>
				<?php  }else if(isset($_GET['school']) AND $_GET['school']!=$_SESSION['School']){} ?>
			</form>
		</footer>

		<?php
			if(isset($_GET['err_file'])){
		?>
				<script type="text/javascript">alert("<?php echo $_GET['err_file']; ?>");</script>
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