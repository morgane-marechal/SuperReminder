<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css"/>
        <link rel="stylesheet" type="text/css" href="../styleDrag.css"/>

        <meta http-equiv="x-ua-compatible" content="IE=edge"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Tâches</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

</head>
<body>
    <?php require('header.php');?>

    <div class="container">
        <h1>JavaScript - Drag and Drop</h1>

        <div class="drop-targets">

            <div class="borderbox">
                <h2>A Faire</h2> 
                <div class="box" id="afaire">
                    <div class="item" id="item1" draggable="true">
                        Drag 1
                    </div>
                    <div class="item" id="item2" draggable="true">
                        Drag 2
                    </div>
                    <div class="item" id="item3" draggable="true">
                        Drag 3
                    </div>
                </div>
            </div>

            <div class="borderbox">
                    <h2>En cours</h2>
                    <div class="box" id="encours">                       
                    </div>
            </div>

           
            <div class="borderbox">
                    <h2>Fait</h2> 
                    <div class="box" id="fait">                       
                    </div>
            </div>

        </div>


    <?php require('footer.php');?>
</body>
    <script defer src="../scriptDrag.js"></script>
    <script defer src="../scriptDesign.js"></script>



</html>
