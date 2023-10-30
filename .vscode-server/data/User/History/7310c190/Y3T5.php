<?php

namespace Controllers;

class UserController extends Controller {

    public function create() {
        $stmt = $this->db->query("SELECT id, ville_nom FROM villes_france_free LIMIT 20");
        $villes = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo $this->twig->render('create.html', ['villes' => $villes]);
    }

    public function insert()
{
    try {

        $user_nom = $_POST['nom'];
        $user_prenom = $_POST['user_prenom'];
        $ville_id = $_POST['ville_id'];

        $stmt = $this->db->prepare("INSERT INTO user (user_nom, user_prenom, ville_id) VALUES (:nom, :prenom, :ville_id)");
        $stmt->bindParam(':user_nom', $user_nom);
        $stmt->bindParam(':user_prenom', $user_prenom);
        $stmt->bindParam(':ville_id', $ville_id);

        $stmt->execute();

        echo "Les données ont été insérées avec succès.";
    } catch (\PDOException $e) {
        echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    }
}
}
?>