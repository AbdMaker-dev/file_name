<?php

namespace App\DataFixtures;

use App\Entity\EtatBrief;
use App\Entity\Langue;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["VALIDE","BROULLON"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $etaB = new EtatBrief();
            $etaB->setLibelle($table[$i]);
            $manager->persist($etaB);
            $manager->flush();
            $this->addReference($table[$i],$etaB);
        }
    }
}