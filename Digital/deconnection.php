<?php 
	session_start();
	require_once("../../../parametre.inc");
	
	try{
		$bdd= new PDO("mysql:host=$serveur;dbname=$database1;charset=utf8",$user,$user_password);
		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		session_unset();
		session_destroy();
		header('Location: acc.php');
	}
	catch(PDOException $e){
		echo 'Erreur '.$e->getMessage();
	}
?>