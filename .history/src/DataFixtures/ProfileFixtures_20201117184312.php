<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileFixtures extends Fixture
{

    public const CM = "cm";
    public const FORMATEUR = "formateur";
    public const APPRENANT = "apprenant";
    public const ADMIN = "admin";
    
    public function load(ObjectManager $manager)
    {
        $table = ["CM","FORMATEUR","APPRENANT","ADMIN"];
        
        for ($i=0; $i < count($table); $i++) 
        { 
            $profil = new Profile();
            $profil->setLibelle($table[$i]);
            $manager->persist($profil);
            $manager->flush();
            if ($table[$i]=="CM")
            {
                $this->addReference(self::CM,$profil);
            }
            if ($table[$i]=="FORMATEUR")
            {
                $this->addReference(self::FORMATEUR,$profil);
            }
            if ($table[$i]=="APPRENANT") {
                $this->addReference(self::APPRENANT,$profil);
            }
            if ($table[$i]=="ADMIN") {
                $this->addReference(self::ADMIN,$profil);
            }
        }
    }
}
