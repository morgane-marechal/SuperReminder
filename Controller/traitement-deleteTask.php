<?php
session_start();


require ("../Model/Task.php");

$id_task = htmlspecialchars($_GET["deleteTask"]);
echo $id_task;

$objectTask = new Task();
$deleted = $objectTask->deleteTask($id_task);
echo $deleted;

?>