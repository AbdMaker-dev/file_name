<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
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
        $profil = new Profile();

        for ($i=0; $i < ; $i++) { 
            
        }
        
        // $manager->persist($apprenant);
        // $manager->flush();
    }
}
