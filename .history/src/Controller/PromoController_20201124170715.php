<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


    /**
     * @Route("/api/admin")
     */
class PromoController extends AbstractController
{
    /**
     * @Route("/promo", name="add_promo" methods={"POST"})
     */
    public function addPromo(Request $request): Response
    {
        dd($request);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }

    /**
     * @Route("/promoddd", name="get_promo_id_group_id")
     */
    public function getPromoIdGroupId(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }

        /**
     * @Route("/promo", name="updatePromoId_ef")
     */
    public function updatePromoIdRef(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }
 
    /**
     * @Route("/promo", name="")
     */
    public function updatePromoIdAppre(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }   
    
    /**
     * @Route("/promo", name="promo")
     */
    public function updatePromoIdForm(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }  
    
    
    /**
     * @Route("/promo", name="promo")
     */
    public function updatePromoIdGroupdId(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }      
}
