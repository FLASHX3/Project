<?php
  if(!isset($_SESSION['id'])){
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
  <div class="login-wrapper">
    <form action="Traitement/verif_log.php" method="post" class="form" onsubmit="return verif_form(this);">
      <img src="img/avatar.png" alt="erreur lors du chargement de l'image">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" oninput="verif_log(this);" required>
        <label for="loginUser">User Name</label>
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
      <form action="Traitement/verif_mail.php" class="form">
        <br/>
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>

<?php
}else{

}
?>