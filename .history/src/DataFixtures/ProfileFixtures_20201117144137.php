<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class P extends Fixture
{
    private $encode;

    public const CM = "cm";
    public const FORMATEUR = "formateur";
    public const APPRENANT = "apprenant";
    
    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
        
    }

    public function load(ObjectManager $manager)
    {
        $table = ["CM","FORMATEUR","APPRENANT"];
        

        for ($i=0; $i < count($table); $i++) { 
            $profil = new Profile();
            if ($table[$i]=="CM") {
                $profil->setLibelle($table[$i]);
                $manager->persist($profil);
                $manager->flush();
                $this->addReference(self::CM,$profil);
            }
            if ($table[$i]=="FORMATEUR") {
                $profil->setLibelle($table[$i]);
                $manager->persist($profil);
                $manager->flush();
                $this->addReference(self::FORMATEUR,$profil);
            }
            if ($table[$i]=="APPRENANT") {
                $profil->setLibelle($table[$i]);
                $manager->persist($profil);
                $manager->flush();
                $this->addReference(self::APPRENANT,$profil);
            }
        }
        
        // $manager->persist($apprenant);
        // $manager->flush();
    }
}
