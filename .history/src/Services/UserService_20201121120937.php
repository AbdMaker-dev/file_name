<?php
namespace App\Services;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserServices
{
    function addUserService($request ,$serializer,$validator,$entity ,$encoder)
    {
        //recupéreation de tout les attribut de la requette post
        $ob = $request->request->all();
        //verification  si l'email existe au niveau de la base de donnée return ob ou null
        $avatar = $request->files->get("image");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $ob["image"] = $avatar;
        }
        $ob = $serializer->denormalize($ob, $entity);
        $errors = $validator->validate($ob);
        if ($errors != 0) {
            $errors = $serializer->serialize($errors, "json");
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST, [], true);
        }
        $ob->setPassword($encoder->encodePassword($ob, "password"));
        $ob->setArchiver(0);

       return  $ob;

    }


}