<?php
namespace App\Services;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserServices
{
    function addUserSrv($request ,$serializer,$validator,$entity ,$encoder)
    {
        //recupéreation de tout les attribut de la requette post
        $user = $request->request->all();
        //verification  si l'email existe au niveau de la base de donnée return user ou null
        $avatar = $request->files->get("image");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $user["image"] = $avatar;
        }
        $user = $serializer->denormalize($user, $entity);
        $errors = $validator->validate($user);
        if ($errors != 0) {
            $errors = $serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        $user->setPassword($encoder->encodePassword($user, "password"));
        $user->setArchiver(0);

       return  $user;

    }


}