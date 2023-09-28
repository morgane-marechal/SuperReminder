<?php
    session_start();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />

            <meta http-equiv="x-ua-compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
            <title>Accueil</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
            <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <?php require('headerIndex.php');?>

    <h1>Bienvenue sur notre site web</h1>
    <?php //var_dump($_SESSION);?>

    <!-- <button id="inscription-button" class="call-form-btn">Inscription</button>
    <button id="connexion-button" class="call-form-btn">Connexion</button> -->

    <div id="forms-space"></div>

    <?php require('footerIndex.php');?>

</body>
<script defer src="script.js"></script>
<script defer src="scriptDesign.js"></script>

</html>