<?php
	session_start();
	try{
		$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	catch(PDOException $e){
		die('ERREUR: '.$e->getMessage());
	}

	if (isset($_POST['message']) AND !empty($_POST['message'])){
		$school=$_GET['school'];
		if(isset($_POST['message'])){
			$message=strip_tags($_POST['message']);
			$requete=$bdd->prepare("INSERT INTO message VALUES ('',?,?,NOW(),?,?)");
			$requete->execute(array($_SESSION['User_name'],$message,$_SESSION['School'],$school));
			$requete->closeCursor();
			header('location: plate-forme.php#derniermessage');
		}
	}

	if(isset($_FILES['file']) AND $_FILES['file']['error']==0){
		if($_FILES['file']['size']<20971520){  //fichier inférieur à 20mo
			$info_fichier=pathinfo($_FILES['file']['name']);
			$extensionn_fichier=$info_fichier['extension'];
			$extension_autorisees=array('jpg','jpeg','png','JPG','JPEG','PNG','pdf','PDF','doc','DOC','docx','DOCX','xls','XLS','xlsx','XLSX','ppt','PPT','pptx','PPTX','txt','TXT','zip','ZIP');

			if(in_array($extensionn_fichier, $extension_autorisees)){
				move_uploaded_file($_FILES['file']['tmp_name'], '../Document/'.basename($_FILES['file']['name']));
				header('location: plate-forme.php');
			}
			else{
				header('location: plate-forme.php?err_avt=Only jpg,txt,jpeg, png,pdf,doc,docx,xls,ptt');
			}
		}
		else{
			header('location: plate-forme.php?err_avt=This file is too weighty');
		}
	}else{
		header('location: plate-forme.php');
	}
	
?>