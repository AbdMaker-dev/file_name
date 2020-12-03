<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/api/formateur")
*/
class BriefController extends AbstractController
{
    /**
     * @Route("/promo/{id}/groupe/{di}/briefs", name="promo_id_groupe")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BriefController.php',
        ]);
    }
}
