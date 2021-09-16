<?php
	if(isset($_POST['ecole']) AND !empty($_POST['ecole'])){
		try{
			$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
			$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

			foreach ($_POST['ecole'] as $value) {
				$delete=$bdd->prepare("DELETE FROM établissements WHERE Nom_établissement=?");
				$delete->execute(array($value));
				unlink('../img/ecole/'.$value.'.png');
			}
			$delete->closeCursor();
			header('location: ajouter.php?a=false&delete=succes');
		}
		catch(PDOException $e){
			die("Erreur: ".$e->getMessage());
		}
	}else{
		header('location: ajouter.php?a=false');
	}
?>