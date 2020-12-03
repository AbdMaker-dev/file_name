<?php

namespace App\Controller;

use App\Entity\Referentiel;
use App\Repository\CompetenceRepository;
use App\Repository\CritereAdmissionRepository;
use App\Repository\CritereEvaluationRepository;
use App\Repository\ReferentielRepository;
use App\Services\ApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api/admins")
 */
class ReferentielController extends AbstractController
{
    /**
     * @Route("/referentiels", name="referentiel_add", methods={"POST"})
     */
    public function addReferentiel(Request $request, CritereEvaluationRepository $repo_cri_eva, CritereAdmissionRepository $repo_cri_add, ApiService $apiService, SerializerInterface $serializer, CompetenceRepository $repo_competence, EntityManagerInterface $em): Response
    {
        // security du route
        if (in_array("ROLE_APPRENANT", $this->getUser()->getRoles())) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        $data = json_decode($request->getContent(), true);

        $competences = $data['competences'];
        $cri_eva = $data['crEvaluation'];
        $cri_admi = $data['crAdmission'];

        unset($data['competences']);
        unset($data['crEvaluation']);
        unset($data['crAdmission']);

        $new_ref = $serializer->denormalize($data, "App\Entity\Referentiel");

        foreach ($competences as $key => $value) {
            $new_ref->addCompetence($repo_competence->find($value));
        }
        
        $new_ref->setCrAdmission($apiService->serialize($cri_admi, "CritereAdmission", $repo_cri_add));
        $new_ref->setCrEvaluation($apiService->serialize($cri_eva, "CritereEvaluation", $repo_cri_eva));

        $em->persist($new_ref);
        $em->flush();

        return $this->json([
            'message' => 'Succes'
        ]);
    }


        /**
     * @Route("/referentiels/{id}", name="referentiel_update", methods={"PUT"})
     */
    public function updateReferentiel(int $id, Request $request, ReferentielRepository $repo_ref, CritereEvaluationRepository $repo_cri_eva, CritereAdmissionRepository $repo_cri_add, ApiService $apiService, SerializerInterface $serializer, CompetenceRepository $repo_competence, EntityManagerInterface $em): Response
    {
        // security du route
        if (in_array("ROLE_APPRENANT", $this->getUser()->getRoles())) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        $data = json_decode($request->getContent(), true);

        $competences = $data['competences'];
        $cri_eva = $data['crEvaluation'];
        $cri_admi = $data['crAdmission'];
        unset($data['competences']);
        unset($data['crEvaluation']);
        unset($data['crAdmission']);

        $

        $new_ref = $repo_ref->find($id);

        foreach ($data as $key => $value) {
            $setFeild = "set".ucfirst($key);
            $new_ref->$setFeild($value);
        }

        foreach ($competences as $key => $value){
            $new_ref->addCompetence($repo_competence->find($value));
        }
        
        $new_ref->setCrAdmission($apiService->serialize($cri_admi, "CritereAdmission", $repo_cri_add));
        $new_ref->setCrEvaluation($apiService->serialize($cri_eva, "CritereEvaluation", $repo_cri_eva));

        $em->flush();

        return $this->json([
            'message' => 'Succes'
        ]);
    }



}
