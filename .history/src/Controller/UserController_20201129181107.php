<?php

namespace App\Controller;

use App\Services\UserService;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


    /**
     * @Route("/api/admin")
     */
class UserController extends AbstractController
{

    private $profile;

    private $current_user;

    /**
     * @Route("/users/registre", name="users_registre", methods={"POST"})
     */
    public function addUser(Request $request, UserService $us_serice, SerializerInterface $sr ,EntityManagerInterface $entityManager): Response
    {

        // json 

        $data = json_decode($request->getContent(), true);

        $newUser = $sr->




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
     * @Route("/users/update/{id}", name="users_update", methods={"PUT"})
     */    
    public function updateUser(int $id, Request $request, UserService $us_serice, EntityManagerInterface $entityManager)
    {
        // security du route
        if (!in_array("ROLE_ADMIN", $this->getUser()->getRoles()) || $this->getUser()->getId() == $id) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        $user_updae = $us_serice->updateUserService($request, $id);

        if ($user_updae == null) {
            return $this->json([
                'message' => 'echec de la modifiaction',
            ]);
        }

        $entityManager->flush();

        return $this->json([
            'message' => 'Succes',
        ]);
    }
    
}
