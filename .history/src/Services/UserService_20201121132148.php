<?php
namespace App\Services;


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

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->encoder = $encoder;
    }

    
    function addUserService($request, $entity)
    {
        //recupéreation de tout les attribut de la requette post
        $object = $request->request->all();
        //verification  si l'email existe au niveau de la base de donnée return object ou null
        $avatar = $request->files->get("avatre");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $object["avatre"] = $avatar;
        }
        $object = $this->serializer->denormalize($object, $entity);

        dd($object)
        $errors = $this->validator->validate($object);

        if ($errors) {
            $errors = $this->serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        $object->setPassword($this->encoder->encodePassword($object, "password"));
        $object->setArchiver(0);

       return  $object;

    }


}