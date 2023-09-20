<?php
session_start();

require("../Model/Task.php");
$title=$_POST['title'];
$def=$_POST['def'];
$state=$_POST['state'];
$id_user=$_SESSION['id'];

$newtask = new Task();
echo $newtask->newtask($title,$def,$id_user, $state );





?>