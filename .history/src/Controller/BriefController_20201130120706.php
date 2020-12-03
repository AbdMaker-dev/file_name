<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
    * @Route("/api/admin")
*/
class BriefController extends AbstractController
{
    /**
     * @Route("/brief", name="brief")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BriefController.php',
        ]);
    }
}
