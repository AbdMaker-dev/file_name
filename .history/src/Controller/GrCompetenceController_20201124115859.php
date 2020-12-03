<?php

namespace App\Controller;

use App\Entity\GroupeCompetence;
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
    public function addGroupeComptence(Request $request, SerializerInterface $serialize): Response
    {
        
        

        $data_gr_competence = json_decode($request->getContent(),true);
        
        $new_gr_competence = new GroupeCompetence();

        $new_gr_competence->setLibelle($data_gr_competence['libelle']);
        foreach ($data_gr as $key => $value) {
            # code...
        }
        dd($data_gr_competence);
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GrCompetenceController.php',
        ]);
    }
}
