<?php

namespace Controllers ;
use PDO;
use Demande;
use Engin;
use Urgence;

class DemandeController extends Controller{

    public function paneldemande($params) {
        
        $entityManager = $params["em"];
        $demandeRepository = $entityManager->getRepository('Demande');
        $demandes = $demandeRepository->findAll();

        // faire le test de si l'utilisteur est bien connecté, et aussi si il est pompier
        if ($this->isLoggedIn()) {
            echo $this->twig->render('crudDemande.html', ['demandes' => $demandes, 'params' => $params]); 
        } else {
            header('Location: start.php?c=user&t=login');
        }
        // if ($this->hasSpecificRole()) {
        //         echo $this->twig->render('crudDemande.html', ['demandes' => $demandes, 'params' => $params]); 
        //     } else {
        //         echo $this->twig->render('error.html', ['message' => 'Accès non autorisé.']);
        //     }
        // } else {
        //     header('Location: start.php?c=user&t=login');
        //     exit();
        // }
    }
    
    public function createdemande($params) {
        $entityManager = $params["em"];
        $engins = $entityManager->getRepository(Engin::class)->findAll();
        $urgences = $entityManager->getRepository(Urgence::class)->findAll();
        
        // faire le test de si l'utilisteur est bien connecté, et aussi un pompier
        if ($this->isLoggedIn()) {
            echo $this->twig->render('createDemande.html', ['engins'=>$engins, 'urgences' => $urgences]);
        } else {
            header('Location: start.php?c=user&t=login');
        }
    }

    public function insert($params) {
        $em=$params['em'];

        $engin_id = ($_POST['engin']);
        $engin = $em->getRepository(Engin::class)->find($engin_id);
        $urgence_id = ($_POST['urgence']);
        $urgence = $em->getRepository(Urgence::class)->find($urgence_id);
        $coment=($_POST['coment']);

        $newDemande = new Demande();
        $newDemande->setEngin($engin);
        $newDemande->setUrgence($urgence);
        $newDemande->setComent($coment);

        $em->persist($newDemande);
        $em->flush();

        echo $this->twig->render('success.html', ['message' => 'Votre demande à bien été pris en compte !']);

    }

}