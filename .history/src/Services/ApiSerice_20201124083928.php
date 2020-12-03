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

    
    public function serialize($array, $entity)
    {

        $tabO
        foreach ($array as $key => $value) {
            
        }
    }


}