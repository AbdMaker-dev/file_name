<?php

namespace App\DataFixtures;

use App\Entity\EtatBrief;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EtatBriefFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["ASSIGNER","VA"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $etaBrief = new EtatBrief();
            $etaBrief->setLibelle($table[$i]);
            $manager->persist($etaBrief);
            $manager->flush();
            $this->addReference($table[$i],$etaBrief);
        }
    }
}