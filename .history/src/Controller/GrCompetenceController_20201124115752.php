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
        dd($data_gr_competence);
        $new_gr_competence = new GroupeCompetence();

        $ne

        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GrCompetenceController.php',
        ]);
    }
}
