<?php

namespace Controllers ; 

class UserController extends Controller
{
    public function index()
    {   
        $prenomtUser="Sofyan";
        $userAge="19";
        $userVille="Nogent-sur-Oise";
        echo $this->twig->render('userinfo.html',['prenomUser'=>$prenomUser , 'userAge'=>$userAge , 'userVille'=>$userVille]);
    }

    public function liste($url) {
        var_dump($url);
        $data="tous";
        echo $this->twig->render('userinfo.html',['data'=>$data]);
    }

    public function create() 
    {
        echo $this->twig->render('create.html');
    }

    
    public function insert()
    {
        try {
            $db = new \PDO(
                'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
                'sofyan',
                'plop'
            );

            $user_nom = $_POST['user_nom'];
            $user_prenom = $_POST['user_prenom'];
            $user_ville = $_POST['user_ville'];

            $stmt = $db->prepare("INSERT INTO users (user_nom, user_prenom, user_ville) VALUES (:nom, :prenom, :ville)");

            $stmt->bindParam(':nom', $user_nom);
            $stmt->bindParam(':prenom', $user_prenom);
            $stmt->bindParam(':ville', $user_ville);

            $stmt->execute();

            echo "Les données ont été insérées avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données : " . $e->getMessage();
        }
    }

    public function list() {
        try {
            $db = new \PDO(
                'mysql:host=localhost;dbname=BTS_SOFYAN;charset=utf8',
                'sofyan',
                'plop'
            );
    
            // Configuration du mode d'erreur PDO
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "SELECT id, nom FROM villes_france_free";
            $result = $db->query($sql);
    
            echo '<select name="user_ville">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
            }
            echo '</select>';
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
    
}

?>