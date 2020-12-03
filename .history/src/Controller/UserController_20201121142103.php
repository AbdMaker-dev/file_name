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
        
        if (!in_array("ROLE")) {
            # code...
        }

    }
    /**
     * @Route("/apprenants/registre", name="apprenant_registre", methods={"post"})
     */
    public function addApprenant(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {
        $new_apprenant = $us_serice->addUserService($request, "App\Entity\Apprenant");
        
        $prfl = $this->profile->findOneBySomeField("APPRENANT");

        $new_apprenant->setProfile($prfl);

        $entityManager->persist($new_apprenant);
        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
    }

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
     * @Route("/cms/registre", name="cm_registre", methods={"POST"})
     */
    public function addCm(Request $request, UserService $us_serice, EntityManagerInterface $entityManager): Response
    {
        $new_cm = $us_serice->addUserService($request, "App\Entity\Cm");
        
        $prfl = $this->profile->findOneBySomeField("CM");

        $new_cm->setProfile($prfl);

        $entityManager->persist($new_cm);
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
