<?php
    session_start();
?>
<?php
    //var_dump($_SESSION);
        require('../Model/User.php');
        $login=$_POST['login'];
        $mp=$_POST['password'];

       if((isset($login))&&(isset($mp))){
        $newLog = new User();
        $success = $newLog->connexion($login, $mp);
        echo json_encode($success);
    }
    ?>