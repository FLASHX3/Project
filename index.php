<?php 
    if(!isset($_SESSION['Id'])){
?>

<html>
    <head>
        <link rel="stylesheet" media="screen" href="CSS/acc.css"/>
        <link rel="shortcut icon" type="image/ico" href="img/Logo_RSA.ico">
        <title>RSA</title>
    </head>
    <body>
        <header class="head">
            <nav>
                <h1 id="logo">RSA</h1>
                <ul>
                    <li><a href="Digital/acc.php">Connexion</a></li>
                    <li><a href="Digital/sign up.php">Inscription</a></li>
                </ul>
            </nav>
        </header>
        <div class="body">
            <h1>Welcome.<br>
            This is a platform bringing together several higher and secondary schools for educational purposes.
            </h1>
        </div>
    </body>
</html>
<?php
    }else{
        echo 'Erreur de connexion';
    }
?>
