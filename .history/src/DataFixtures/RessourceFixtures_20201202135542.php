<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use App\Entity\Apprenant;
use App\Entity\Ressource;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use phpDocumentor\Reflection\Types\Resource_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RessourceFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["google.com","facebook.com"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $ressource = new Ressource();
            $ressource->setUrl(($table[$i]);
            $manager->persist($profil);
            $manager->flush();
            $this->addReference($table[$i],$ressource);
        }
    }
}
