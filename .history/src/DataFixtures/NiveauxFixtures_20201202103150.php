<?php

namespace App\DataFixtures;

use App\Entity\Langue;
use App\Entity\Niveau;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Niveau 1","Niveau 2","Niveau 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $langue = new Niveau();
            $langue->setLibelle($table[$i]);
            $manager->persist($langue);
            $manager->flush();
            $this->addReference($table[$i],$langue);
        }
    }
}