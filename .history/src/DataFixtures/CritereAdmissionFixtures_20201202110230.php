<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CritereAdmissionFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["CritereAdmission 1","CritereAdmission 2","CritereAdmission 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $cri_ad = new CritereAdmission();
            $cri_ad->setLibelle($table[$i]);

            $manager->flush();
            $this->addReference($table[$i],$cri_ad);
        }
    }
}