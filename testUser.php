<?php 
    session_start();
?>

<?php

echo "hello world";
require('Model/User.php');
$object = new User();
$MP = $object->register('Fleur', 'azerty');
$all = $object->getAll();
//var_dump($all);

$userInfo = $object->getUserInfo('1');
//var_dump($userInfo);

//$object->setLogin('1', 'Harold');


//var_dump($_SESSION);

?>