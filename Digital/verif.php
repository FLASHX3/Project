<?php
    if(isset($_POST['name']) AND isset($_POST['username']) AND isset($_POST['school']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirmpassword']))
    {# on supprime les balises
        $name=strip_tags($_POST['name']);
        $username=strip_tags($_POST['username']);
        $school=strip_tags($_POST['school']);
        $age=strip_tags($_POST['age']);
        $email=strip_tags($_POST['email']);
        $mdp=strip_tags($_POST['password']);
        $cmdp=strip_tags($_POST['confirmpassword']);

        #on verifie la structure des entrées si elles les regex
        if(!(preg_match("#^[A-Z][a-z -_éèôâêîïç]{1,24}$#", $name))){
            header('Location: sign up.php?err_name=invalid name! capital letter in first letter');
        }
        if(!(preg_match("#^[a-zA-Z0-9 -._çéèôâêîï@$\#]{3,25}$#", $username))){
            header('Location: sign up.php?err_user_name=invalid user name!');
        }
        if(!(preg_match("#^[A-Z][a-zA-Z -éèêôçï']{2,38}$#i", $school))){
            header('Location: sign up.php?err_school=invalid school! capital letter in first letter');
        }
        if(!(preg_match("#^[0-9]{2}$#", $age))){
            header('Location: sign up.php?err_age=invalid age!');
        }
        if(!(preg_match("#^[a-zA-Z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))){
            header('Location: sign up.php?err_email=invalid email! 8 charaters maximum!');
        }
        if(!(preg_match("#^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$#", $mdp))){
            header('Location: sign up.php?err_password=invalid password!');
        }
        if(!(preg_match("#^[a-zA-Z0-9éèôâêîï.-_*@&$]{8}$#", $cmdp))){
            header('Location: sign up.php?err_conf_password=invalid password! number,*_-.&@$éèôâêîï');
        }
        if(!($mdp==$cmdp)){  #les mots de passe doivent être identiques
            header('Location: sign up.php?err_conf_password=Passwords are not identiques!');
        }

        $mdp=sha1($mdp);  #on hache le mot de passe

        try
        {# connection à la base de donnée
            $connexion=new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $e)
        {
            die('Erreur:'.$e->getMessage());
        }

        #on verifie si l'email entrez par l'utilisateur existe déja dans notre bd
        $reqtest=$connexion->prepare('SELECT * FROM users WHERE Email=?');
        $reqtest->execute(array($email));
        $resultat=$reqtest->fetch();

        if (!empty($resultat)){  #Si ces identifiants sont déja utilisés on renvoie une erreur
            $reqtest->closeCursor();
            header('Location: sign up.php?err_email=This email adresse is using');
        }else{
            $reqtest->closeCursor();
            $insertion=$connexion->prepare("INSERT INTO users VALUES('',?,?,?,?,?,?,'user')"); #on l'inscrit dans la bd
            $insertion->execute(array($name,$username,$school,$age,$email,$mdp));
            $insertion->closeCursor();

            echo "<script type='text/javascript'>alert('$name your are welcome!');</script>";

            #on recupère les infos de l'utilisateur qui vient de s'inscrire
            $requete=$connexion->prepare("SELECT * FROM users WHERE Email=?");
            $requete->execute(array($email));
            $userinfo=$requete->fetch();

            session_start();
            $_SESSION['Id']=$userinfo['Id'];
            $_SESSION['Name']=$userinfo['Name'];
            $_SESSION['User_name']=$userinfo['User_name'];
            $_SESSION['Email']=$userinfo['Email'];
            $_SESSION['School']=$userinfo['School'];
            $_SESSION['Age']=$userinfo['Age'];
            $_SESSION['Type_user']=$userinfo['Type_user'];
            $requete->closeCursor();
            header("location: plate-forme.php#derniermessage"); #redirection vers l'espace user (forum)
        }
    }
?>