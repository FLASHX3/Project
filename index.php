<?php
  if(!isset($_POST['loginUser'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="shortcut icon" type="image/jpg" href="img/icon.jpg"/>
  <script type="text/javascript" src="JS/index.js"></script>
  <title>Login</title>
</head>
<body>
  <div class="login-wrapper" align="center">
    <form action="index.php" method="post" class="form" onsubmit="return verif_form(this);">
      <img src="img/avatar.png" alt="erreur lors du chargement de l'image">
      <h2>Login</h2>
      <div class="input-group">
        <input type="email" name="loginUser" id="loginUser" oninput="verif_log(this);" required>
        <label for="loginUser">Email</label>
        <span id="err_log"><?php if(isset($_GET['err_log'])){echo $_GET['err_log'];}?></span>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" id="loginPassword" maxlength="8" oninput="verif_mdp(this);" required>
        <label for="loginPassword">Password</label>
        <span id="err_mdp"><?php if(isset($_GET['err_mdp'])){echo $_GET['err_mdp'];}?><?php if(isset($_GET['erreur'])){echo $_GET['erreur'];}?></span>
      </div>
      <input type="submit" value="Login" class="submit-btn">
      <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
      <a href="Digital/sign up.php">Sign up</a>
    </form>

    <div id="forgot-pw">
        <form method="post" action="" class="form">
        <br/>
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
          <span id="err_forgot_email"><?php if(isset($_GET['err_forgot_email'])){echo $_GET['err_forgot_email'];}?></span>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>

<?php
}
if(isset($_POST['loginUser']) AND isset($_POST['loginPassword'])){
  try
    {
      $connexion=new PDO("mysql:host=localhost;dbname=digital;charset=utf8",'root','FLASHX3*');
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
  catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }
  if (!empty($_POST['loginUser']) AND !empty($_POST['loginPassword']))
    {
        $email=strip_tags($_POST['loginUser']);
        $mdp=strip_tags($_POST['loginPassword']);

        if(!(preg_match("#^[a-zA-Z0-9.-_]{2,}@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email)))
        {
            header('Location: index.php?err_log=invalid email!');
        }
        if(!(preg_match("#^[a-zA-Z0-9.-_*@&$]{8}$#", $mdp)))
        {
            header('Location: index.php?err_mdp=invalid password!');
        }
        $mdp=SHA1($mdp);

        if(!empty($email) AND !empty($mdp))
        {
            $requser=$connexion->prepare('SELECT * FROM users WHERE Email=? AND Password=?');
            $requser->execute(array($email,$mdp));

            $userexist=$requser->rowCount();
            
            if ($userexist > 0)
            {
                $userinfo=$requser->fetch();
                $_SESSION['Id']=$userinfo['Id'];
                $_SESSION['Email']=$userinfo['Email'];
                $_SESSION['Name']=$userinfo['Name'];
                $_SESSION['User_name']=$userinfo['User_name'];
                $_SESSION['Type_user']=$resultat['Type_user'];
                header("Location: Digital/plate-forme.php");               
            }else{
                header("Location: index.php?erreur=These identifiers do not exit!");
            }
        }
    else 
      {
        header('location index.php?erreur=please fill in the fields!');
      }
    }
}

if(isset($_GET['email']))
{
    $forgot_email=strip_tags($_POST['email']);
    if(!(preg_match("#^[a-zA-Z0-9.-_]{2,}@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $forgot_email)))
    {
        header('Location: index.php#forgot-pw?err_forgot_email=invalid email!');
    }
}
?>