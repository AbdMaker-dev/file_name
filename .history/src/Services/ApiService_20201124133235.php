<?php
namespace App\Services;


use App\Entity\Niveau;
use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiService
{
    private $serializer;
    private $repo_Competence;
    private $validator;
    private $encoder;
    private $profile;
    private $user_repo;

    public function __construct(CompetenceRepository $repo_Competence,ProfileRepository $profile, UserRepository $user_repo, SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->repo_Competence = $repo_Competence;

        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->profile = $profile;

        $this->user_repo = $user_repo;
    }

    
    public function serialize($array, $entity, $repo)
    {

        $tabObect = [];

        foreach ($array as $key => $value) {
            dd($value['libelle']);
            $setFeild = "set".
            $obj = $repo->findOneBy
            $tabObect[] = $this->serializer->denormalize($value, "App\Entity\\".$entity);
        }

        return $tabObect;
    }


    public function getCompetences($data_competence)
    {
        $comptences = [];
        foreach ($data_competence as $key => $comptence) {
            if (isset($comptence['id'])){
                $comptences[] = ($this->repo_Competence->findOneById($comptence['id']));
                // dd($repo_Competence->findOneById($comptence['id']));
            }else{
                $compt = new Competence();
                $compt->setLibelle($comptence['libelle']);
                foreach ($comptence['niveaux'] as $key => $value) {
                    $niv = new Niveau();
                    $compt->addNiveau($niv->setLibelle($value['libelle']));
                }
                $comptences[] = ($compt);
            }
        }

        return $comptences;
    }

}