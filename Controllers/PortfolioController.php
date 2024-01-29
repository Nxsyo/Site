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

    public function addCompetence($params) {
        $realisationId = $params['post']['realisationId'];
        $competenceId = $params['post']['competenceId'];
    
        $entityManager = $params["em"];
    
        $realisation = $entityManager->find(Realisation::class, $realisationId);
        $competence = $entityManager->find(Competence::class, $competenceId);
    
        if (!$realisation || !$competence) {
            return new JsonResponse('error');
        }
    
        $realisation->addCompetence($competence);
    
        $entityManager->persist($realisation);
        $entityManager->flush();
    
        return new JsonResponse('success');
    }

    public function removeCompetence($params) {
        $realisationId = $params['post']['realisationId'];
        $competenceId = $params['post']['competenceId'];
    
        $entityManager = $params["em"];
    
        $realisation = $entityManager->find(Realisation::class, $realisationId);
        $competence = $entityManager->find(Competence::class, $competenceId);
    
        if (!$realisation || !$competence) {
            return new JsonResponse('error');
        }
    
        $realisation->removeCompetence($competence);
    
        $entityManager->persist($realisation);
        $entityManager->flush();
    
        return new JsonResponse('success');
    }
    }