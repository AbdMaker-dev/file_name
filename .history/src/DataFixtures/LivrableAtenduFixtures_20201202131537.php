<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LivrableAtenduFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Github","Figma","Trello"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $profil = new Livr();
            $profil->setLibelle($table[$i]);
            $manager->persist($profil);
            $manager->flush();
            $this->addReference($table[$i],$profil);
        }
    }
}
