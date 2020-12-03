<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
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
        $table = ["Groupe 1","Groupe 2","Groupe 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $groupe = new Groupe();
            $groupe->setLibelle($table[$i]);
            $manager->persist($groupe);
            $manager->flush();
            $this->addReference($table[$i],$groupe);
        }
    }
}