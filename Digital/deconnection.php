<?php 
	session_start();
	
	try{
		$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		session_unset();
		session_destroy();
		header('Location: ../index.php');
	}
	catch(PDOException $e){
		echo 'Erreur '.$e->getMessage();
	}
?>