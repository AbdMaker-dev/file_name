<?php
namespace App\Services;


use App\Repository\ProfileRepository;
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

    public function __construct(ProfileRepository $profile, SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->profile = $profile;
    }

    
    function addUserService($request)
    {
        //recupéreation de tout les attribut de la requette post
        $object = $request->request->all();

        if (!$object['profile']) {
            return null ;
        }

        //verification  si l'email existe au niveau de la base de donnée return object ou null
        $avatar = $request->files->get("avatare");

        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $object["avatare"] = $avatar;
        }

        $object = $this->serializer->denormalize($object, "App\Entity\\".ucfirst(strtolower($object["profile"])));

        $object->setPassword($this->encoder->encodePassword($object, "passer_1234"));
        $prfl = $this->profile->findOneByOneL(strtoupper($object["profile"]));
        $object->setProfile($prfl);

        $errors = $this->validator->validate($object);
        // dd($errors);
        if (count($errors) != 0) {
            $errors = $this->serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        
       return  $object;

    }


}