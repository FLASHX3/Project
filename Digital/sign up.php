<?php
  if(!isset($_SESSION['id'])){

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
?>

<!DOCTYPE html>
<!-- saved from url=(0073)file:///C:/Users/User/Documents/Wambz1/DP/login%20SJD%20DP/sign%20in.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" type="image/ico" href="../img/Logo_RSA.ico"/>
    <script type="text/javascript" src="../JS/sign up.js"></script>
    <title>Sign up</title>
</head>
<body>
    <div class="login-wrapper">
    <form action="verif.php" method="post" class="form" onsubmit="return verif_form(this);">
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
            <label for="school">School</label><br><br>
            <select name="school" id="school" onchange="verif_school(this);">
                <option value=""></option>
                <?php
                    $requete=$connexion->prepare("SELECT Nom_établissement,Cursus FROM établissements ORDER BY Cursus,Nom_établissement");
                    $requete->execute();

                    echo '<optgroup label="Secondary">';
                    while($resultat=$requete->fetch()){
                        if(!isset($a) OR $a==$resultat['Cursus']){
                            echo '<option value="'.$resultat['Nom_établissement'].'">'.$resultat['Nom_établissement'].'</option>';
                        }else{
                            echo '</optgroup><optgroup label="University">';
                        }
                        $a=$resultat['Cursus'];
                    }$requete->closeCursor();
                    echo '</optgroup>';
                ?>
            </select>
            <span id="err_school"><?php if(isset($_GET['err_school'])){echo $_GET['school'];} ?></span>
        <br><br>
        </div>
        <div class="input-group">
            <input type="number" name="age" id="age" maxlength="2" oninput="verif_age(this);" required>
            <label for="age">Age</label>
            <span id="err_age"><?php if(isset($_GET['err_age'])){echo $_GET['err_age'];}?></span>
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
?>