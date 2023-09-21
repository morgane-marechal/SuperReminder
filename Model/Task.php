<?php

class task {
    private $db = "null";
        
        public function __construct() {
            try {
                $this->db = new PDO("mysql:host=localhost;dbname=db_super_reminder",'root','Dyane198124//');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                    $intask->bindParam(':title', $title);
                    $intask->bindParam(':def', $def);
                    $intask->bindParam(':id_user', $id_user);
                    $intask->bindParam(':state', $state);
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
                return json_encode($alltask);
                } 
              
                
        public function updatetask($id, $state){
                    $stmt = $this->db->prepare("UPDATE task SET state = :state WHERE id = :id");
                    $stmt->bindParam(':state', $state);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
        
                    return true;
               
        }    
}                  
    
?>


