<?php
    session_start();
?>

<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Connexion</title>
</head>

<body>
    <?php require('header.php');?>

    <h1>Connectez-vous !</h1>


    <form id="form-connexion" action="" method="post" class="module-form">
        <div class="module-form">
            <label for="login">Entrer le login : </label>
            <input type="text" name="login" id="login" required />
        </div>
        <div class="module-form">
            <label for="password">Vérifier le mot de passe: </label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="module-form">
            <input class="submit" type="submit" value="Soumettre" />
        </div>
    </form>

    <div id="content-toast">
        <div id="toast-screen">Hello</div>
    </div>
    
    
    <?php //var_dump($_SESSION);?>

    <?php require('footer.php');?>


</body>
<script defer src="../scriptDesign.js"></script>
<script defer src="../scriptConnexion.js"></script>


</html>