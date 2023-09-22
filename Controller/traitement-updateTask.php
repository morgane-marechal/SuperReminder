<?php
session_start();

require ("../Model/Task.php");

$id_task = htmlspecialchars($_GET["updateTask"]);
$state_task = htmlspecialchars($_GET["valueUpdate"]);

echo $id_task;
echo "<br>";
echo $state_task;

$objectTask = new Task();
//var_dump($objectTask);
$update = $objectTask->updatetask($id_task, $state_task);
echo $update;

?>