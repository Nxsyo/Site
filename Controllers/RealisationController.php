<?php

namespace Controllers;

use Realisation;

class RealisationController extends Controller {

    public function panelRealisation($params) {
        $entityManager = $params["em"];
        $realisationRepository = $entityManager->getRepository('Realisation');
        $realisations = $realisationRepository->findAll();

        return $this->render('crudRealisation.html', ['realisations' => $realisations, 'params' => $params]);
    }

    public function createRealisation($params) {
        $entityManager = $params["em"];
        $localisations = $entityManager->getRepository('Localisation')->findAll();
        $competences = $entityManager->getRepository('Competence')->findAll();

        return $this->render('createRealisation.html', ['localisations' => $localisations, 'competences' => $competences]);
    }

    public function insert($params) {
        $em = $params['em'];

        $lib = ($_POST['lib']);
        $localisationId = ($_POST['localisation']);
        $localisation = $em->find('Localisation', $localisationId);

        $competenceIds = ($_POST['competences']);
        $competences = [];
        foreach ($competenceIds as $competenceId) {
            $competences[] = $em->find('Competence', $competenceId);
        }

        $newRealisation = new Realisation();
        $newRealisation->setLib($lib);
        $newRealisation->setLocalisation($localisation);

        foreach ($competences as $competence) {
            $newRealisation->addCompetence($competence);
        }

        $em->persist($newRealisation);
        $em->flush();

        header('Location: start.php?c=realisation&t=panelrealisation');
    }

    public function deleteRealisation($params) {
        $id = ($params['get']['id']);
        $em = $params['em'];
        $realisation = $em->find('Realisation', $id);

        $em->remove($realisation);
        $em->flush();

        header('Location: start.php?c=realisation&t=panelrealisation');
    }

    public function editRealisation($params) {
        $entityManager = $params["em"];
        $localisations = $entityManager->getRepository('Localisation')->findAll();
        $competences = $entityManager->getRepository('Competence')->findAll();

        $id = ($params['get']['id']);
        $em = $params['em'];
        $realisation = $em->find('Realisation', $id);

        return $this->render('editRealisation.html', ['realisation' => $realisation, 'localisations' => $localisations, 'competences' => $competences]);
    }

    public function updateRealisation($params) {
        $em = $params['em'];
        $id = $params['post']['id'];

        $realisation = $em->find(Realisation::class, $id);

        $lib = $params['post']['lib'];
        $localisationId = $params['post']['localisation'];
        $localisation = $em->find('Localisation', $localisationId);

        $competenceIds = $params['post']['competences'];
        $competences = [];
        foreach ($competenceIds as $competenceId) {
            $competences[] = $em->find('Competence', $competenceId);
        }

        $realisation->setLib($lib);
        $realisation->setLocalisation($localisation);
        $realisation->getCompetences()->clear();

        foreach ($competences as $competence) {
            $realisation->addCompetence($competence);
        }

        $em->flush();

        return $this->redirectToRoute('realisation_list');
    }
}