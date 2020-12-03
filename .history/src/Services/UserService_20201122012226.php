<?php
namespace App\Services;


use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    private $serializer;
    private $validator;
    private $encoder;
    private $profile;
    private $user_repo;

    public function __construct(ProfileRepository $profile, UserRepository $user_repo, SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->profile = $profile;

        $this->user_repo = $user_repo;
    }

    
    function addUserService($request)
    {
        //recupéreation de tout les attribut de la requette post
        $object = $request->request->all();

        if (!isset($object['profile'])) {
            return null ;
        }

        $_profile = $object['profile'];
        unset($object['profile']);

        $avatar = $request->files->get("avatare");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $object["avatare"] = $avatar;
        }

        $object = $this->serializer->denormalize($object, "App\Entity\\".ucfirst(strtolower($_profile)));

        $object->setPassword($this->encoder->encodePassword($object, "passer_1234"));
        $prfl = $this->profile->findOneByLibelle(strtoupper($_profile));
        $object->setProfile($prfl);

        $errors = $this->validator->validate($object);
        if (count($errors) != 0) {
            $errors = $this->serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        
       return  $object;

    }

    public function updateUserService($request, $id)
    {
    
        $object = $request->request->all();

        if ($object == []) {
            return null;
        }

        $user = $this->user_repo->indOneById($id);

        foreach ($object as $key => $value) {
          $user->set.ucfirst($key)()
        }

    }


}