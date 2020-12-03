<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NiveauFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Niveau 1","Niveau 2","Niveau 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $niveau = new Niveau();
            $niveau->setLibelle($table[$i]);
            $niveau->setCriEvaluation("critere avaluation " . $table[$i]);
            $niveau->setGrAction("groupes action " . $table[$i]);
            $manager->persist($niveau);

            $manager->flush();
            $this->addReference($table[$i],$niveau);
        }
    }

    public function getDependencies()
    {
        return array (Comte::class);
    }
}