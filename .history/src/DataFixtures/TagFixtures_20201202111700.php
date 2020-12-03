<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TagFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Tag 1","Tag 2","Tag 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $Tag = new Tag();
            $groupe->setLibelle($table[$i]);
            $manager->persist($groupe);
            $manager->flush();
            $this->addReference($table[$i],$groupe);
        }
    }
}