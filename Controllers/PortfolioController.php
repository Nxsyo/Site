<?php

namespace Controllers;

use PDO;
use Candidat;
use Centre;
use Competence;
use Realisation;

class PortfolioController extends Controller
{
    public function table($params) {
        $entityManager = $params["em"];
        $candidats = $entityManager->getRepository(Candidat::class)->findAll();
        $centres = $entityManager->getRepository(Centre::class)->findAll();
        $competences = $entityManager->getRepository(Competence::class)->findAll();
        $realisations = $entityManager->getRepository(Realisation::class)->findAll();


        echo $this->twig->render('portfolio.html', ['candidats' => $candidats, 'centres' => $centres, 'competences' => $competences, 'realisations' => $realisations, 'params' => $params]); 
    }
}