<?php 

class User{

    private $db = 'NULL';

    public function __construct(){
        $env = parse_ini_file('.env');
        $user = $env["ADMIN_USERNAME"];
        $host = $env["ADMIN_HOST"];
        $dbname = $env["ADMIN_DB"];
        //echo $user;
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, '');
        $this->db = $db;
    }


    public function register($login, $mp){
        if (!$this->verifUser($login)) {
                $sql = "INSERT INTO user (login, mp)
                        VALUES (:login, :mp)";
                $sql_exe = $this->db->prepare($sql);
                $sql_exe->execute([
                    'login' => htmlspecialchars($login),
                    'mp' =>password_hash($mp, PASSWORD_DEFAULT)
                ]);
                if ($sql_exe) {
                    return json_encode(array("success" => true));
                    
                } else {
                    return json_encode(array("success" => false));

                }
            } else {
                return json_encode(array("success" => false));
            }
        }



    public function verifUser($login){
        $sql = "SELECT * 
                FROM user
                WHERE login = :login";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([
            'login' => $login,
        ]);
        $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            return true;
        } else {
            return false;
        }
    }

    public function connexion($login, $mp){
        $hashPassword=$this->getPassword($login);
        if (password_verify($mp, $hashPassword)){
            $sql = "SELECT * 
                    FROM user
                    WHERE login = :login";
            $sql_exe = $this->db->prepare($sql);
            $sql_exe->execute([
                'login' => $login,
            ]);
            $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
            //var_dump($results);
            if ($results) {
                $getId=$this->getId($login);
                $_SESSION["id"]=$getId[0]["id"];
                $_SESSION["login"]=$login;
               return json_encode(array("success" => true));
            } else {
                return json_encode(array("success" => false));
            }
        }
    }

    public function getAll(){
        $displayUsers = $this->db->prepare("SELECT * FROM user");
        $displayUsers->execute([
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserInfo($id){
        $displayUser = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $displayUser->execute([
            'id' => $id,
        ]);
        $result = $displayUser->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getId($login){
        $displayUsers = $this->db->prepare("SELECT * FROM user WHERE login = :login");
        $displayUsers->execute([
            'login' => $login,
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPassword($login){
        $displayUsers = $this->db->prepare("SELECT mp FROM user WHERE login = :login");
        $displayUsers->execute([
            'login' => $login,
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['mp'];
    }

    public function setLogin($id, $login){
        if (!$this->verifUser($login)) {
            $setLogin = $this->db->prepare("UPDATE user SET login = :login WHERE id = :id");

        $setLogin->execute([
            'id' => $id,
            'login' => $login,
        ]);
            if ($setLogin) {
                return json_encode(array("success" => true));
            }else{
                return json_encode(array("success" => false));
            }
        }else{
            return json_encode(array("success" => false));

        }
    }





    public function setPassword($id, $mp){
        $setPassword = $this->db->prepare("UPDATE user SET mp = :mp WHERE id = :id");
        $setPassword->execute([
            'id' => $id,
            'mp' =>password_hash($mp, PASSWORD_DEFAULT)
        ]);
        if ($setPassword) {
            return json_encode(array("success" => true));
        }else{
            return json_encode(array("success" => false));
        }
    }


}
  