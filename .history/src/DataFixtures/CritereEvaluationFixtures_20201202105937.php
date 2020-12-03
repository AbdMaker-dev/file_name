<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NiveauFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["CritereEvaluation 1","CritereEvaluation 2","CritereEvaluation 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $niveau = new Niveau();
            $niveau->setLibelle($table[$i]);

            $manager->flush();
            $this->addReference($table[$i],$niveau);
        }
    }
}