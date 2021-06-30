<?php
	if(isset($_POST['loginUser']) AND isset($_POST['loginPassword']))
	{
		#on supprime les balises
		$_POST['loginUser']=strip_tags($_POST['loginUser']);
		$_POST['loginPassword']=strip_tags($_POST['loginPassword']);

		#on vérifie la structure des 2 identifiants
		if(!(preg_match("#^[a-zA-Z@éèç0-9-._ ]{3,25}$#", $_POST['loginUser'])))
		{
			header('Location: ../index.php?err_log=invalid user name');
		}
		if(!(preg_match("#^[a-zA-Z0-9.-_*@&$]{8}$#", $_POST['loginPassword'])))
		{
			header('Location: ../index.php?err_mdp=invalid password');
		}

		$mdp=sha1($_POST['loginPassword']); #on hache son de mot de passe

		try
		{
			$bdd=new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$requete=$bdd->prepare("SELECT * FROM users WHERE User name=:user AND Password=:pass");
			$requete->bindParam('user',$_POST['loginUser']);
			$requete->bindParam('pass',$mdp);
			$requete->execute();
			$resultat=$requete->fetch();

			if(empty($resultat)) #si les identifiants n'existe pas dans la bd
			{
				header('location: ../index.php?erreur=These identifiers do not exit');
			}else{
				session_start();
				$_SESSION['id']=$resultat['Id'];
				$_SESSION['name']=$resultat['Name'];
				$_SESSION['user_name']=$resultat['User name'];
				$_SESSION['school']=$resultat['School'];
				$_SESSION['email']=$resultat['Email'];
				$_SESSION['type_user']=$resultat['Type user'];
				$requete->closeCursor();
				header('location: ../Digital/plate-forme.php');
			}
		}catch(PDOException $e){
			echo 'erreur : '.$e->getMessage();
		}
	}else{
		header('location: ../index.php?err_mdp=please fill in the fields!');
	}
?>