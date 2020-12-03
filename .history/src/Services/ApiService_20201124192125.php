<?php
namespace App\Services;

use App\Entity\Apprenant;
use App\Entity\Niveau;
use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use App\Repository\FormateurRepository;
use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use phpDocumentor\Reflection\Types\This;
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
    private $repo_profil;
    private $repo_form;

    public function __construct(FormateurRepository $repo_form,CompetenceRepository $repo_Competence,ProfileRepository $profile, ProfileRepository $repo_profil, SerializerInterface $serializer, ValidatorInterface $validator, UserPasswordEncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->repo_Competence = $repo_Competence;
        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->profile = $profile;
        $this->repo_profil = $repo_profil;
        $this->repo_form= $repo_form;
    }

    
    public function serialize($array, $entity, $repo)
    {
        $tabObect = [];
        foreach ($array as $key => $value) {
            $obj = $repo->findOneByLibelle($value['libelle']);
            if ($obj) {
                $tabObect[] = $obj;
            }else{
                $tabObect[] = $this->serializer->denormalize($value, "App\Entity\\".$entity);
            }
           
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

    public function unsetter($object,$tabKeys)
    {
        foreach ($tabKeys as $key => $value) {
            unset($object[$value]);
        }

        return $object;
    }

    public function creatApprenant($tabEmails)
    {
        $tabAppres = [];
        foreach ($tabEmails as $key => $mail) {
            $new_appre = new Apprenant();
            $new_appre->setProfile($this->repo_profil->findOneByLibelle("APPRENANT"));
            $new_appre->hydrate();
            $tabAppres[] = $new_appre->setEmail($mail)->setPassword($this->encoder->encodePassword($new_appre,$this->generePassword($mail)));
        }
        return $tabAppres;
    }


    public function retrivesFormateur($idFormateurs)
    {
        $tabFormateurs = [];
        foreach ($idFormateurs as $key => $value) {
            $tabFormateurs[] = $this->repo_form->find($value);
        }
        return $tabFormateurs;
    }

    public function cre



    public function generePassword($mail)
    {
        return "passer_".$mail[0].$mail[2].$mail[5].$mail[6];
    }
}