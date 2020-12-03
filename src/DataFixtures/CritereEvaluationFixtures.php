<?php

namespace App\DataFixtures;

use App\Entity\CritereEvaluation;
use App\Entity\Niveau;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CritereEvaluationFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["CritereEvaluation 1","CritereEvaluation 2","CritereEvaluation 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $cri_eva = new CritereEvaluation();
            $cri_eva->setLibelle($table[$i]);
            $manager->persist($cri_eva);
            $manager->flush();
            $this->addReference($table[$i],$cri_eva);
        }
    }
}