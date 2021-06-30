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
    <form action="Traitement/verif_new_user.php" method="post" class="form" onsubmit="return verif_form(this);">
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
        <input type="password" name="password" id="password" oninput="verif_password(this);" required>
        <label for="password">Password</label>
        <span id="err_password"><?php if(isset($_GET['err_password'])){echo $_GET['err_password'];}?></span>
      </div>
      <div class="input-group">
        <input type="password" name="confirmpassword" id="confirmpassword" oninput="verif_conf_pass(this);" required>
        <label for="confirmpassword">Confirm password</label>
        <span id="err_conf_password"><?php if(isset($_GET['err_conf_password'])){echo $_GET['err_conf_password'];}?></span>
      </div>
      <div class="buttton">
        <input type="submit" value="Submit" class="submit-btn">
        <input type="reset" value="Reset" class="reset-btn">
      </div>
    </form>
  </div>
</body>
</html>