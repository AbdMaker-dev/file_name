<?php

namespace App\Controller;

use App\Entity\GroupeCompetence;
use App\Repository\CompetenceRepository;
use App\Repository\GroupeCompetenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

/**
     * @Route("/api/admins")
     */
class GrCompetenceController extends AbstractController
{
    /**
     * @Route("/groupe_competences", name="add_gr_competence",  methods={"POST"})
     */
    public function addGroupeComptence(Request $request, SerializerInterface $serialize, CompetenceRepository $repo_Competence, ): Response
    {

        $data_gr_competence = json_decode($request->getContent(),true);
        
        $new_gr_competence = new GroupeCompetence();

        $new_gr_competence->setLibelle($data_gr_competence['libelle']);

        foreach ($data_gr_competence['competences'] as $key => $comptence) {
            if (isset($comptence['id'])){
                $new_gr_competence->addCompetence($repo_Competence->findOneById($comptence['id']));
            }else{
                // dd($comptence);
                $new_gr_competence->addCompetence($serialize->denormalize($comptence, "App\Entity\Competence"));
            }
        }

        dd($new_gr_competence);
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GrCompetenceController.php',
        ]);
    }
}
