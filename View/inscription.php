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
        <title>Inscription</title>
        <link rel="icon" type="image/x-icon" href="../favicon.ico">

    </head>

    <body>
        <?php require('header.php');?>

        <h1>S'inscrire ici</h1>

        <form id="form-register" action="" method="post" class="module-form">
            <div class="module-form">
                <label for="login">Entrer le login : </label>
                <input type="text" name="login" id="login" required />
            </div>
            <div class="module-form">
                <label for="lastname">Entrer le nom : </label>
                <input type="text" name="lastname" id="lastname" required />
            </div>
            <div class="module-form">
                <label for="firstname">Entrer le prénom complet: </label>
                <input type="text" name="firstname" id="firstname" required />
            </div>
            <div class="module-form">
                <label for="password">Mot de passe: </label>
                <p style="margin: 0px 0px 30px 0px;"><small>Minimum de huit caractères, avec une majuscule, un chiffre et un caractère spécial</small></p>

                <input type="password" name="password" id="password" required />
            </div>
            <div class="module-form">
                <label for="password">Vérifier le mot de passe: </label>
                <input type="password" name="password-check" id="password-check" required />
            </div>
            <div class="module-form">
                <input class="submit" type="submit" value="Soumettre" />
            </div>
        </form>
    
        <div id="content-toast">
            <div id="toast-screen">Hello</div>
        </div>

        <?php require('footer.php');?>

    </body>
        <script defer src="../scriptRegisterForm.js"></script>
        <script defer src="../scriptDesign.js"></script>


</html>