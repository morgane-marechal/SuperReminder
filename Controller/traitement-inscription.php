<?php
require('../Model/User.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login=$_POST['login'];
        $goodPatternPassword=false;
        $samePasswords=false;
        $password=$_POST['password'];
        $checkPassword=$_POST['password-check'];
        $pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    

    //check pattern password
        if (preg_match($pattern, $password)){
            $goodPatternPassword=true;

        }else{
            $message_pattern = "mauvais format";
        echo json_encode(array("success" => $message_pattern));

        }

        if($password===$checkPassword){
            $samePasswords=true;

        }else{
            $message_same_password= "diff MP";
            echo json_encode(array("success" => $message_same_password));

        }

        if((isset($login))&&($goodPatternPassword===true)&&($samePasswords===true)){
            $register = new User();
            $success = $register->register($login, $password);
            echo json_encode($success);
            //header("Location: connexion.php");
        }
    }

?>