<?php
session_start();

require ("../Model/Task.php");
$id_user=$_SESSION['id'];
$newtask = new Task();
$alltask = $newtask->showtask($id_user);
echo json_encode($alltask, JSON_INVALID_UTF8_IGNORE);


?>