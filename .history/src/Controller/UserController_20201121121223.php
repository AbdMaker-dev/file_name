<?php

namespace App\Controller;

use App\Services\UserServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/admins")
*/
class UserController extends AbstractController
{
    /**
     * @Route("/apprenants/registre", name="user", methods={"POST"})
     */
    public function addApprenant(UserServices $us_serice, ): Response
    {
        $new_apprenant = $us_serice->addUserService($request ,$serializer,$validator,"App\Entity\Apprenant",$encoder);


        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * @Route("/registre", name="user", methods={"POST"})
     */
    public function addAdmin(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }  
    

    /**
     * @Route("/cm/registre", name="user", methods={"POST"})
     */
    public function addCm(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }  
    
    
    /**
     * @Route("/formateurs/registre", name="user", methods={"POST"})
     */
    public function addFormateur(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }      
}
