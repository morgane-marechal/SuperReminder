<?php
require('Connect.php');

class task extends Connect{
    private $db = "NULL";
        
        public function __construct() {
            try {
                // $env = parse_ini_file('.env');
                // $user = $env["ADMIN_USERNAME"];
                // $host = $env["ADMIN_HOST"];
                // $dbname = $env["ADMIN_DB"];
                // //echo $user;
                // $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, '');
                // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db = $this->connection();
                $this->db = $db;
            } catch(PDOException $e) {
                throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        public function closeConnection() {
            $this->db = null;
        }
        public function getConnection() {
            return $this->db;
        }


        public function checktask($title, $id_user) {
            
                // Vérifier si la tache existe dans la base de données
                $stmt = $this->db->prepare("SELECT * FROM task WHERE title = :title AND id_user = :id_user");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->execute();

                $results = $stmt->fetch(PDO :: FETCH_ASSOC);
                if ($results) {
                    return true;
                 } else{
                    return false;
                 }
                }
        
        public function newtask($title,$def,$id_user, $state ) {
            //verifier si une tache avec le meme titre et le meme id_user : 
                if ($this->checktask($title, $id_user)=== false){
                    $sql = "INSERT INTO task (title, def, id_user, state) VALUES (:title, :def, :id_user, :state)";
                    $intask = $this->db->prepare($sql);
                    $intask->bindParam(':title', htmlspecialchars($title));
                    $intask->bindParam(':def', htmlspecialchars($def));
                    $intask->bindParam(':id_user', $id_user);
                    $intask->bindParam(':state', htmlspecialchars($state));
                    $intask->execute();
                }else{
                    return 'cette tache existe dejà';
                }
        }

        public function showtask($id_user){
            //verifier quelle tache est associee a un utilisateur defini   
                $stmt = $this->db->prepare("SELECT * FROM task WHERE id_user = :id_user");
                $stmt->bindParam(':id_user', $id_user);
                $stmt->execute();
        
                $alltask = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $alltask;
                } 
              
                
        public function updatetask($id, $state){
                    $stmt = $this->db->prepare("UPDATE task SET state = :cstate WHERE id = :id");
                    $stmt->bindParam(':cstate', $state);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    if ($stmt) {
                        return "yeah";
                     } else{
                        return "nooo";
                    }
        } 

        
        public function deleteTask($id){
            $stmt = $this->db->prepare("DELETE FROM task WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt) {
                return "yeah";
             } else{
                return "nooo";
            }
         }       

}                  
    
?>


