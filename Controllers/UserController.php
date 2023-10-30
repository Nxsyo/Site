<?php

namespace Controllers ; 

class UserController extends Controller

{
    public function index()
    {   
        $prenomUser="Sofyan";
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

            $db = new \PDO(
                'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
                'sofyan',
                'plop'
            );

        $stmt=$db->query('SELECT id, ville_nom FROM villes_france_free LIMIT 20');
        $villes=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo $this->twig->render('create.html',['villes'=>$villes]);

    }

    
    public function insert()
{
    $db = new \PDO(
        'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
        'sofyan',
        'plop'
    );

    try {
        $user_nom = $_POST['user_nom'];
        $user_prenom = $_POST['user_prenom'];
        $ville_id = $_POST['ville_id'];

        $stmt = $db->prepare("INSERT INTO users (user_nom, user_prenom, ville_id) VALUES (:nom, :prenom, :ville_id)");

        $stmt->bindParam(':nom', $user_nom);
        $stmt->bindParam(':prenom', $user_prenom);
        $stmt->bindParam(':ville_id', $ville_id);

        $stmt->execute();

        echo "Les données ont été insérées avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    }
}

    public function display() {
        $db = new \PDO(
            'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
            'sofyan',
            'plop'
        );

        ##ici une requete sera ecrite 
        ##petit essai
    }
    
}

?>