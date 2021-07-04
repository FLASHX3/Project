 <?php
session_start();
	try
		{
			$connexion=new PDO("mysql:host=localhost;dbname=digital",'root','FLASHX3*');
			$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
	catch(Exception $e)
		{
			die('Erreur:'.$e->getMessage());
		}
	if (isset($_POST['submit']))
		{
			$nom=htmlspecialchars($_POST['nom']);
			$matricule=htmlspecialchars($_POST['matricule']);
					
			if(!empty($nom) AND !empty($matricule))
				{
					$requser=$connexion->prepare('SELECT * FROM users WHERE Email=? AND Password=?');
					$requser->execute(array($nom,$matricule));
					$userexist=$requser->rowCount();
						
					if ($userexist > 0)
						  	{
							$userinfo=$requser->fetch();
							$_SESSION['Id']=$userinfo['Id'];
							$_SESSION['Email']=$userinfo['Email'];
							$_SESSION['Password']=$userinfo['Password'];

							header("Location: plate-forme.php?id=".$_SESSION['id']);								
						}
					else
						{	
							$a=header("Location: Erreur.php");
							echo $a;
						}
				}
			else 
				{
					echo"le champ de login et password sont vides ";
				}
		}

?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>CARNET NUMERIQUE</title>
        <link rel="stylesheet" href="sty.css" />
    </head>
    <body> 
    	<header ><img class="logo" src="logo.jpg" >
           <b class="nom">S.|.J.|.D Pharmaceuticals</b><br>
    	<ul class="onglet">
        <li><a href="accueil.php">Home</a></li>
        <li class="actuel"><a href="connection.php">Connexion</a></li></ul> <br>  
    </header><br><br><br><br><center>
    		 <i><b>Bienvenu sur l'infirmerie de SJD !</b> </i>
    	<br><br>
    		<article><br>
    			<form action="" method="POST">
            	<fieldset>
                <legend>Connexion</legend>
                <table>
                <thead>
                <td><label><b>Nom d'utilisateur</b></label></td>
                <td><input type="email" placeholder="Entrer le nom d'utilisateur" name="nom" required></td>
                </thead>
                <tbody>
                <td><label><b>Matricule</b></label></td>
                <td><input type="password" placeholder="Entrer votre matricule" name="matricule" required></td>
                </tbody><br>
				</table><br>
                <input type="submit" value="Valider" name="submit">
            </form>
    		<br></article>
    	</section></center>
    </body>
</html>