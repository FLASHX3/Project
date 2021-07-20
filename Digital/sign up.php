<?php
  if(!isset($_SESSION['id'])){
?>

<!DOCTYPE html>
<!-- saved from url=(0073)file:///C:/Users/User/Documents/Wambz1/DP/login%20SJD%20DP/sign%20in.html -->
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="shortcut icon" type="image/jpg" href="../img/icon.jpg"/>
  <script type="text/javascript" src="../JS/sign up.js"></script>
  <title>Sign up</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="sign up.php" method="post" class="form" onsubmit="return verif_form(this);">
      <h2>Sign up</h2>
      <div class="input-group">
        <input type="text" name="name" id="name" oninput="verif_name(this);" required>
        <label for="name">Name</label>
        <span id="err_name"><?php if(isset($_GET['err_name'])){echo $_GET['err_name'];}?></span>
      </div>
      <div class="input-group">
        <input type="text" name="username" id="username" oninput="verif_user_name(this);" required>
        <label for="username">User Name</label>
        <span id="err_user_name"><?php if(isset($_GET['err_user_name'])){echo $_GET['err_user_name'];}?></span>
      </div>
      <div class="input-group">
        <input type="text" name="school" id="school" oninput="verif_school(this);" required>
        <label for="school">School</label>
        <span id="err_school"><?php if(isset($_GET['err_school'])){echo $_GET['err_school'];}?></span>
      </div>
      <div class="input-group">
        <input type="email" name="email" id="email" oninput="verif_email(this);" required>
        <label for="email">Email</label>
        <span id="err_email"><?php if(isset($_GET['err_email'])){echo $_GET['err_email'];}?></span>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="password" maxlength="8" oninput="verif_password(this);" required>
        <label for="password">Password</label>
        <span id="err_password"><?php if(isset($_GET['err_password'])){echo $_GET['err_password'];}?></span>
      </div>
      <div class="input-group">
        <input type="password" name="confirmpassword" id="confirmpassword" maxlength="8" oninput="verif_conf_pass(this);" required>
        <label for="confirmpassword">Confirm password</label>
        <span id="err_conf_password"><?php if(isset($_GET['err_conf_password'])){echo $_GET['err_conf_password'];}?></span>
      </div>
      <div class="buttton">
        <input type="submit" value="Submit" class="submit-btn">
        <input type="reset" value="Reset" class="reset-btn"><br>
        <a href="../index.php" id="sign_in">sign in</a>
      </div>
    </form>
  </div>
</body>
</html>

<?php
    }
    if(isset($_POST['name']) AND isset($_POST['username']) AND isset($_POST['school']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirmpassword']))
    {# on supprime les balises
        $name=strip_tags($_POST['name']);
        $username=strip_tags($_POST['username']);
        $school=strip_tags($_POST['school']);
        $email=strip_tags($_POST['email']);
        $mdp=strip_tags($_POST['password']);
        $cmdp=strip_tags($_POST['confirmpassword']);

        #on verifie la structure des entrées si elles les regex
        if(!(preg_match("#^[A-Z][a-z-ôâï ]{1,24}$#", $name))){
            header('Location: sign up.php?err_name=invalid name! capital letter in first letter');
        }
        if(!(preg_match("#^[a-zA-Z@éèç0-9-._# ]{3,25}$#", $username))){
            header('Location: sign up.php?err_user_name=invalid user name!');
        }
        if(!(preg_match("#^[A-Z][a-zA-Z-éèô ]{2,38}$#", $school))){
            header('Location: sign up.php?err_school=invalid school! capital letter in first letter');
        }
        if(!(preg_match("#^[a-zA-Z0-9.-_]{1,}@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email))){
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

        $mdp=sha1($mdp);  #on hache le mot de passe

        #on verifie si l'email entrez par l'utilisateur existe déja dans notre bd
        $reqtest=$connexion->prepare('SELECT * FROM users WHERE Email=?');
        $reqtest->execute(array($email));
        $resultat=$reqtest->fetch();

        if (!empty($resultat)){  #Si ces identifiants sont déja utilisés on renvoie une erreur
            header('Location: sign up.php?err_email=This email adresse is using');
        }else{
            $reqtest->closeCursor();
            $insertion=$connexion->prepare("INSERT INTO users VALUES('',?,?,?,?,?,'user')"); #on l'inscrit dans la bd
            $insertion->execute(array($name,$username,$school,$email,$mdp));
            $insertion->closeCursor();

            #on recupère les infos de l'utilisateur qui vient de s'inscrire
            $requete=$connexion->prepare("SELECT * FROM users WHERE Email=?");
            $requete->execute(array($email));
            $userinfo=$requete->fetch();

            session_start();
            $_SESSION['Name']=$userinfo['Name'];
            $_SESSION['User_name']=$userinfo['User_name'];
            $_SESSION['Email']=$userinfo['Email'];
            $_SESSION['School']=$userinfo['School'];
            $_SESSION['Type_user']=$userinfo['Type_user'];
            header("Location: plate-forme.php");  #redirection vers l'espace user (forum)
        }
       
    }
?>