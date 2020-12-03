<?php

namespace App\DataFixtures;

use App\Entity\CritereEvaluation;
use App\Entity\Niveau;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CritereAdmissionFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["CritereA 1","CritereA 2","CritereA 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $cri_eva = new CritereA();
            $cri_eva->setLibelle($table[$i]);

            $manager->flush();
            $this->addReference($table[$i],$cri_eva);
        }
    }
}