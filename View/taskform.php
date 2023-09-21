<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css"/>
        <meta http-equiv="x-ua-compatible" content="IE=edge"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Todoliste</title>
</head>
<body>
<?php require('header.php');?>


<h2> Liste des taches</h2>
<?php var_dump($_SESSION); ?>
<form id="formtask" action="" method="post" class="task-form">
    <div class = "task-form">
        <label for="title">Titre : </label>
        <input type="text" name="title" id="title" required />
    </div>
    <div class="task-form">
        <label for="def">Définition : </label>
        <input type="text" name="def" id="def" required/>
    </div>
    <div class="task-form">
        <select name="state">
            <option value="a faire">A faire</option>
            <option value="fait">Fait</option>
        </select>
    </div>
    <div class="module-form">
                <input class="submit" type="submit" value="Soumettre" />

</form>

<div id="content-toast">
            <div id="toast-screen">Hello</div>
</div>



<div id="display-task"></div>

        

</body>
    <script defer src="../scriptTask.js"></script>
    <script defer src="../scriptDesign.js"></script>

</html>