<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GrouesFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["CritereAdmission 1","CritereAdmission 2","CritereAdmission 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $cri_admi = new CritereAdmission();
            $cri_admi->setLibelle($table[$i]);
            $manager->persist($cri_admi);
            $manager->flush();
            $this->addReference($table[$i],$cri_admi);
        }
    }
}