<?php

namespace Controllers;

use PDO;
use Centre;

class CentreController extends Controller
{
    public function panelCentre($params) {
        $entityManager = $params["em"];
        $personnelRepository = $entityManager->getRepository('Centre');
        $centres = $personnelRepository->findAll();

        echo $this->twig->render('crudCentre.html', ['centres' => $centres, 'params' => $params]); 
    }

    public function createCentre() {
        echo $this->twig->render('createCentre.html');
        }

    public function insert($params) {
        $em=$params['em'];

        $nom=($_POST['nom']);
        $adresse=($_POST['adresse']);
        $ville = ($_POST['ville']);

        $newCentre = new Centre();
        $newCentre->setNom($nom);
        $newCentre->setAdresse($adresse);
        $newCentre->setVille($ville);


        $em->persist($newCentre);
        $em->flush();

        header('Location: start.php?c=centre&t=panelcentre');
    }

    public function deleteCentre($params) {
        $id=($params['get']['id']);
        $em=$params['em'];
        $centre=$em->find('Centre',$id);

        $em->remove($centre);
        $em->flush();

        header('Location: start.php?c=centre&t=panelcentre');
    }

    public function editCentre($params) {
        $entityManager = $params["em"];

        $id=($params['get']['id']);
        $em=$params['em'];
        $centres=$em->find('Centre',$id);

        echo $this->twig->render('editCentre.html',['centres'=>$centres]);
    }

    public function updateCentre($params) {
        $em = $params['em'];
        $id = $params['post']['id'];
    
        $centres = $em->find('Centre', $id);
    
        $centres->setNom($params['post']['nom']);
        $centres->setAdresse($params['post']['adresse']);
        $centres->setVille($params['post']['ville']);

        $em->flush();
    
        header('Location: start.php?c=centre&t=panelcentre');
        exit();
    }
}