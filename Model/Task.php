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
            
        }
    //             // Vérifier le mot de passe
    //             if (password_verify($password, $hashed_password)) {
    //             // Authentification réussie, créer une session pour l'utilisateur
    //             session_start();
    //             $_SESSION['id'] = true;
    //             $_SESSION['login'] = $row['login'];
            
    
    //                     // Rediriger vers la page de profil ou la page d'admin en fonction du login
    //                     if ($_SESSION['login'] === 'admin') {
    //                         header("Location: admin.php");
    //                     } else {
    //                         header("Location: profil.php");
    //                     }
    //                     exit;
    //                 } else {
    //                     echo "Mot de passe incorrect";
    //                 }
    //             } else {
    //                 echo "Login incorrect";
    //             }
    //         } catch(PDOException $e) {
    //             echo "Erreur: " . $e->getMessage();
    //         }
    //     }
    // }
    
    // // Utilisation des classes
    
    // try {
    //     $host = "localhost";
    //     $username = "root";
    //     $password = "Dyane198124//";
    //     $dbname = "livreor";
    
    //     $db = new Database($host, $username, $password, $dbname);
    //     $user = new User($db);
    
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $login = $_POST['login'];
    //         $password = $_POST['password'];
    
    //         $user->authenticate($login, $password);
    //     }
    
    //     $db->closeConnection();
    // } catch (Exception $e) {
    //     echo "Erreur : " . $e->getMessage();
    
?>


