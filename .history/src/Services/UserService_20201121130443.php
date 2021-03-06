<?php
namespace App\Services;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    private 
    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serialize = $serializer;
        $this->validator = $validator;
        $this->encoder = $encoder;
    }

    
    function addUserService($request, $entity)
    {
        //recupéreation de tout les attribut de la requette post
        $object = $request->request->all();
        //verification  si l'email existe au niveau de la base de donnée return object ou null
        $avatar = $request->files->get("image");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $object["image"] = $avatar;
        }
        $object = $this->serializer->denormalize($object, $entity);

        $errors = $this->validator->validate($object);
        if ($errors != 0) {
            $errors = $this->serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        $object->setPassword($this->encoder->encodePassword($object, "password"));
        $object->setArchiver(0);

       return  $object;

    }


}