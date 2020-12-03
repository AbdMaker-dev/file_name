<?php

namespace App\Controller;

use App\Services\UserService;
use App\Repository\ProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


    /**
     * @Route("/api/admins")
     */
class UserController extends AbstractController
{

    private $profile;

    private $current_user;

    /**
     * @Route("/users/registre", name="users_registre", methods={"POST"})
     */
    public function addUser(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {

        // security du route
        if (!in_array("ROLE_ADMIN", $this->getUser()->getRoles())) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        $new_user = $us_serice->addUserService($request);
    
        if ($new_user == null) {
            return $this->json([
                'message' => 'Un profile est obligatoire',
            ]);
        }

        $entityManager->persist($new_user);
        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
    } 

    /**
     * @Route("/users/up", name="users_update", methods={"PUT"})
     */    
    public function updateUser(Request $request, UserService $us_serice, EntityManagerInterface $entityManager)
    {

    }


    /**
     * @Route("/apprenants/registre", name="apprenant_registre", methods={"post"})
     */
    // public function addApprenant(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    // {

    //     if (!in_array("ROLE_ADMIN", $this->getUser()->getRoles())) {
    //         return $this->json([
    //             'message' => 'Acces no autoriser',
    //         ]);
    //     }
    //     $new_apprenant = $us_serice->addUserService($request, "App\Entity\Apprenant");
        
    //     $prfl = $this->profile->findOneBySomeField("APPRENANT");

    //     $new_apprenant->setProfile($prfl);

    //     $entityManager->persist($new_apprenant);
    //     $entityManager->flush();

    //     return $this->json([
    //         'message' => 'Succes',
    //     ]);
    // }
 
}
