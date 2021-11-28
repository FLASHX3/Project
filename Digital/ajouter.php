<?php
	session_start();
	require_once("../../../parametre.inc");
	if(isset($_SESSION['Id']) AND $_SESSION['Id']!=0){
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if($_GET['a']=="true"){echo "Ajouter une école";}else{echo "Supprimer une école";} ?></title>
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
			<h1 id="entete">Ajouter une école<img src="../img/ecole.jpg" id="icone" alt="erreur"></h1>
			<a href="plate-forme.php#derniermessage" class="close" title="fermer">&times;</a>
			<input type="text" name="établissement" id="établissement" placeholder="Nom de l'établissement" required oninput="verif_ecole(this);"><span id="err_name"><?php if(isset($_GET['err_name'])){echo $_GET['err_name'];} ?></span>
			<fieldset>
				<legend>Type d'établissement</legend>
				<input type="radio" name="type_établissement" value="Collège" id="collège"><label for="collège">Collège</label>
				<input type="radio" name="type_établissement" value="Lycée" id="lycée"><label for="lycée">Lycée</label>
				<input type="radio" name="type_établissement" value="Université" id="université" checked><label for="université">Université</label>
			</fieldset>
			<div class="logo">
				<label for="logo">Logo :</label><input type="file" name="logo" id="logo" required oninput="verif_logo(this);">
			</div>
			<div>
				<button type="submit" id="ajouter" title="ajouter"></button>
				<span id="err_logo"><?php if(isset($_GET['err_logo'])){echo $_GET['err_logo'];}?></span>
			</div>
		</form>
		<?php 
			if(isset($_POST['établissement']) AND isset($_POST['type_établissement']) AND isset($_FILES['logo']) AND !$_FILES['logo']['error']){

				$verifimage=getimagesize($_FILES['logo']['tmp_name']);

				if(!($verifimage && $verifimage[2]<4)){
					unlink($_FILES['logo']['tmp_name']);
					header('location : ajouter.php?a=true&err_logo=ce fichier ne contient pas d\'image');
				}

				$name=strip_tags($_POST['établissement']);

				if(!preg_match("#^[A-Z][a-zA-Z-éèêôçï' ]{2,38}$#i",$name)){
					header('Location: ajouter.php?a=true&err_name=Invalid name of school!');
				}

				try{
					$bdd=new PDO("mysql:host=$serveur;dbname=$database1;charset=utf8",$user,$user_password);
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

									switch ($_POST['type_établissement']):
										case 'Collège':
										case 'Lycée':
											$cursus="Secondary";
											break;	
										case 'Université':
											$cursus="University";
											break;		
										default:
											header('location: ajouter.php?a=true&err_logo=Type of school is not defined');
											break;
									endswitch;

									$req=$bdd->prepare("INSERT INTO établissements VALUES ('',?,?,?)");
									$req->execute(array($name,$_POST['type_établissement'],$cursus));
									$req->closeCursor();

									echo "<script type='text/javascript'>alert('$name has been added!');</script>";
								}else{
									echo "<script type='text/javascript'>alert('Error of uploaded!');</script>";
								}
							}else{
								header('location: ajouter.php?a=true&err_logo=Only jpg,jpeg and png!');
							}
						}else{
							header('location: ajouter.php?a=true&err_logo=This file is too weighty!');
						}	
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
			<h1 id="titre"><a href="plate-forme.php#derniermessage" class="closed" title="fermer">&times;</a>Supprimer une école<img src="../img/ecole.jpg" id="icone" alt="erreur"></h1>
			<form id="delete" method="post" action="supprimer.php" name="form" onsubmit="return verif_choix();">
				<?php if(isset($_GET['delete']) AND $_GET['delete']=="succes"){ ?>
					<script type="text/javascript">alert("Succes Delete!");</script>
				<?php } ?>

				<?php
					try{
						$bdd=new PDO("mysql:host=$serveur;dbname=$database1;charset=utf8",$user,$user_password);
						$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

						$ecole=$bdd->prepare("SELECT Nom_établissement FROM établissements");
						$ecole->execute();
						$nb_ecole=$ecole->rowCount();
						if($nb_ecole>0){
							while($resultat=$ecole->fetch()){
				?>
							<div class="element">
								<input type="checkbox" name="ecole[]" value="<?php echo $resultat['Nom_établissement'];?>" id="<?php echo $resultat['Nom_établissement'];?>"/>
								<label for="<?php echo $resultat['Nom_établissement'];?>">
									<img src="../img/ecole/<?php echo $resultat['Nom_établissement'];?>.png" alt="<?php echo $resultat['Nom_établissement'];?>"/>
									<p class="name"><?php echo $resultat['Nom_établissement'];?></p>
								</label>
							</div>
				<?php
							}
							$ecole->closeCursor();
						}else{
							echo 'AUCUNE ECOLE N\'EST INSCRITE';
						}
					}
					catch(PDOException $e){
						die('ERREUR: '.$e->getMessage());
					}
				?>
				<div>
					<button type="submit" id="supprimer" title="Supprimer"></button>
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