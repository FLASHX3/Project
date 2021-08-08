<?php
	session_start();
	if(isset($_SESSION['Id']) AND $_SESSION['Id']!=0){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une école</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" type="image/ico" href="../img/Logo_RSA.ico">
	<link rel="stylesheet" type="text/css" href="../CSS/ajout.css">
</head>
<body>
	<div id="contain">
<?php
	if($_SESSION['Type_user']="admin" AND $_GET['a']=="true"){
?>
		<form id="add" method="post" action="ajouter.php?a=true" enctype="multipart/form-data" onsubmit="return verif(this);">
			<h1>Ajouter une école<img src="../img/ecole.jpg" id="icone" alt="erreur"></h1>
			<a href="plate-forme.php" class="close" title="fermer">&times;</a>
			<input type="text" name="établissement" id="établissement" placeholder="Nom de l'établissement" required oninput="verif_ecole(this);"><span id="err_name"><?php if(isset($_GET['err_name'])){echo $_GET['err_name'];} ?></span>
			<fieldset>
				<legend>Type d'établissement</legend>
				<input type="radio" name="type_établissement" value="Collège" id="collège"><label for="collège">Collège</label>
				<input type="radio" name="type_établissement" value="Lycée" id="lycée"><label for="lycée">Lycée</label>
				<input type="radio" name="type_établissement" value="Université" id="université" checked><label for="université">Université</label>
			</fieldset>
			<div class="logo">
				<label for="logo">Logo :</label><input type="file" name="logo" id="logo" oninput="verif_logo(this);">
			</div>
			<div>
				<button type="submit" title="ajouter"></button>
				<span id="err_logo"><?php if(isset($_GET['err_logo'])){echo $_GET['err_logo'];}?></span>
			</div>
		</form>
	<?php 
		if(isset($_POST['établissement']) AND isset($_POST['type_établissement']) AND isset($_FILES['logo']) AND $_FILES['logo']['error']==0){

			$name=strip_tags($_POST['établissement']);

			if(!preg_match("#^[A-Z][a-zA-Z-._ éèôç']{1,24}$#",$name)){
				header('Location: ajouter.php?a=true&err_name=Capital letter in first letter!');
			}

			try{
				$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
				$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

				$verify=$bdd->prepare("SELECT Nom_établissement FROM `établissements` WHERE Nom_établissement=?");
				$verify->execute(array($name));
				$resultat=$verify->fetch();
				$nb=$verify->rowCount();

				if($nb>0){
					$verify->closeCursor();
					header('location: ajouter.php?a=true&err_name=This school already exist!');
				}else{
					if($_FILES['logo']['size']<1048576){  //fichier inférieur à 1mo
						$info_fichier=pathinfo($_FILES['logo']['name']);
						$extensionn_fichier=$info_fichier['extension'];
						$extension_autorisees=array('jpg','jpeg','png','JPG','JPEG','PNG');

						if(in_array($extensionn_fichier, $extension_autorisees)){
							if(move_uploaded_file($_FILES['logo']['tmp_name'], '../img/ecole/'.$name.'.png')){
								echo "<script type='text/javascript'>alert('This file had been uploaded!');</script>";
							}else{
								echo "<script type='text/javascript'>alert('Error of uploaded!');</script>";
							}
						}else{
							header('location: ajouter.php?a=true&err_logo=Only jpg, jpeg and png!');
						}
					}else{
						header('location: ajouter.php?a=true&err_logo=This file is too weighty!');
					}

					switch ($_POST['type_établissement']) {
						case 'Collège':
							$cursus="Secondaire";
							break;
						case 'Lycée':
							$cursus="Secondaire";
							break;				
						default:
							$cursus="Universitaire";
							break;
					}

					$req=$bdd->prepare("INSERT INTO établissements VALUES ('',?,?,?)");
					$req->execute(array($name,$_POST['type_établissement'],$cursus));
					$req->closeCursor();

					echo "<script type='text/javascript'>alert('$name has been added!');</script>";
				}
			}
			catch(PDOException $e){
				die('ERREUR: '.$e->getMessage());
			}
		}
	?>
	<?php
		}else if($_SESSION['Type_user']="admin" AND $_GET['a']=="false"){
	?>
			<form id="delete">
				<div class="element">
					<input type="checkbox" name="ecole" id="Saint-Jérôme"><label for="Saint-Jérôme"><img src="../img/ecole/Saint-Jérôme.png"></label>
				</div>
				<div class="element">
					<input type="checkbox" name="ecole" id="IUG"><label for="IUG"><img src="../img/ecole/IUG.png"></label>
				</div>
				<div class="element">
					<input type="checkbox" name="ecole" id="IUC"><label for="IUC"><img src="../img/ecole/IUC.png"></label>
				</div>
				<div class="element">
					<input type="checkbox" name="ecole" id="IUL"><label for="IUL"><img src="../img/ecole/IUL.png"></label>
				</div>
				<div class="element">
					<input type="checkbox" name="ecole" id="Conquete"><label for="Conquete"><img src="../img/ecole/Conquete.png"></label>
				</div>
				<div class="element">
					<input type="checkbox" name="ecole" id="IUGET"><label for="IUGET"><img src="../img/ecole/IUGET.png"></label>
				</div>
				<div>
					<button type="submit" id="supprimer"></button>
				</div>
			</form>
	<?php
		}else{
			echo "Accès interdit à cette page!";
		}
	?>
	</div>
	<script type="text/javascript" src="../JS/ajout.js"></script>
</body>
</html>
<?php
	}else{
		echo "ERREUR DE CONNECTION! VEUILLEZ-VOUS RECONNECTER";
	}
?>