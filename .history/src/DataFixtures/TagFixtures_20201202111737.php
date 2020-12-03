<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use App\Entity\Tags;
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
            $Tag = new Tags();
            $tag->setLibelle($table[$i]);
            $manager->persist($tag);
            $manager->flush();
            $this->addReference($table[$i],$tag);
        }
    }
}