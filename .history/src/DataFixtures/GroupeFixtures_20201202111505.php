<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GroupeFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Gr 1","Gr 2","Gr 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $cri_admi = new Gr();
            $cri_admi->setLibelle($table[$i]);
            $manager->persist($cri_admi);
            $manager->flush();
            $this->addReference($table[$i],$cri_admi);
        }
    }
}