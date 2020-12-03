<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Langue;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["FRANCAIS","ANGLAIS","ESPAGNOLE"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $la = new Langue();
            $la->setLibelle($table[$i]);
            $manager->persist($la);
            $manager->flush();
            $this->addReference($table[$i],$la);
        }
    }
}