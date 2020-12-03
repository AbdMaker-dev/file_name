<?php
namespace App\Services;


use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiService
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

        $tabObect = [];

        foreach ($array as $key => $value) {
            $tabObect[] = $this->serializer->denormalize($value, "App\Entity\\".$entity);
        }

        return $tabObect;
    }


    public function getCompetences()
    {
        foreach ($data_competence as $key => $comptence) {
            if (isset($comptence['id'])){
                $new_gr_competence->addCompetence($repo_Competence->findOneById($comptence['id']));
                // dd($repo_Competence->findOneById($comptence['id']));
            }else{
                $compt = new Competence();
                $compt->setLibelle($comptence['libelle']);
                foreach ($comptence['niveaux'] as $key => $value) {
                    $niv = new Niveau();
                    $compt->addNiveau($niv->setLibelle($value['libelle']));
                }
                $new_gr_competence->addCompetence($compt);
            }
        }
    }

}