<?php
	session_start();

	function EnvoiMessage($message)
	{
		try{
			$bdd= new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch(PDOException $e){
			die('ERREUR: '.$e->getMessage());
		}

		$requete=$bdd->prepare("INSERT INTO message VALUES ('',?,?,NOW(),?,?)");
		$requete->execute(array($_SESSION['User_name'],$message,$_SESSION['School'],$_GET['school']));
		$requete->closeCursor();
		header('location: plate-forme.php#derniermessage');
	}

	function TraiteDoc(){
		if($_FILES['file']['size']<20971520){  //fichier inférieur à 20mo
			$info_fichier=pathinfo($_FILES['file']['name']);
			$extensionn_fichier=$info_fichier['extension'];
			$extension_autorisees=array('jpg','jpeg','png','JPG','JPEG','PNG','pdf','PDF','doc','DOC','docx','DOCX','xls','XLS','xlsx','XLSX','ppt','PPT','pptx','PPTX','txt','TXT','zip','ZIP');

			if(in_array($extensionn_fichier, $extension_autorisees)){
				$name_doc=basename($_FILES['file']['name']);
			}
			else{
				header('location: plate-forme.php?err_file=Only jpg,txt,jpeg,png,pdf,doc,docx,xls,xlsx,zip,ppt and pttx');
			}
		}
		else{
			header('location: plate-forme.php?err_file=This file is too weighty');
		}
		return $name_doc;
	}

	if((isset($_POST['message']) AND !empty($_POST['message'])) AND (isset($_FILES['file']) AND !$_FILES['file']['error'])){
		$name1=strip_tags($_POST['message']);
		$name2=TraiteDoc();
		$final_name=$name2.'<br>'.$name1;
		if(move_uploaded_file($_FILES['file']['tmp_name'], '../Document/'.$name2)){
			EnvoiMessage($final_name);
		}else{
			header('location: plate-forme.php?err_file=error of transfert');
		}
	}
	else if (isset($_POST['message']) AND !empty($_POST['message'])){
		$_POST['message']=strip_tags($_POST['message']);
		EnvoiMessage($_POST['message']);
	}
	else if(isset($_FILES['file']) AND !$_FILES['file']['error']){
		$name=TraiteDoc();
		if(move_uploaded_file($_FILES['file']['tmp_name'], '../Document/'.$name)){
			EnvoiMessage($name);
		}else{
			header('location: plate-forme.php?err_file=error of transfert');
		}
	}else{
		header('location: plate-forme.php');
	}
	
?>