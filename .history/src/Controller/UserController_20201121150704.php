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


    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
    }


        /**
     * @Route("/users/registre", name="cm_registre", methods={"POST"})
     */
    public function addUser(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {
        $new_user = $us_serice->addUserService($request);
    
        if ($new_user == null) {
            return $this->json([
                'message' => 'Succes',
            ]);
        }
        $entityManager->persist($new_user);
        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
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

    /**
     * @Route("/registre", name="admin_registre", methods={"POST"})
     */
    public function addAdmin(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {
        $new_admin = $us_serice->addUserService($request, "App\Entity\Admin");
        
        $prfl = $this->profile->findOneBySomeField("ADMIN");

        $new_admin->setProfile($prfl);

        $entityManager->persist($new_admin);
        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
    }  
    

 
    
    
    /**
     * @Route("/formateurs/registre", name="user", methods={"POST"})
     */
    public function addFormateur(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {
        $new_formateur = $us_serice->addUserService($request, "App\Entity\Formateur");
        
        $prfl = $this->profile->findOneBySomeField("FORMATEUR");

        $new_formateur->setProfile($prfl);

        $entityManager->persist($new_formateur);
        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
    }      
}
