<?php

namespace App\Controller;

use App\Repository\PromoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/api/formateur")
*/
class BriefController extends AbstractController
{
    /**
     * @Route("/promo/{id}/groupe/{di}/briefs", name="promo_id_groupe_id_briefs", methods={"GET"})
     */
    public function index(int $id, int $di, PromoRepository $repo_promo): Response
    {

        $repo_promo->findOneByPomoIdGroupeId($id,$di)
        dd($id . $di );

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BriefController.php',
        ]);
    }
}
