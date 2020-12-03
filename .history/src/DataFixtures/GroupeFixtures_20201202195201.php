<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use App\Entity\Niveau;
use App\Entity\CritereAdmission;
use App\Entity\CritereEvaluation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GroupeFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
        $table = ["Groupe principal","Groupe 1","Groupe 2","Groupe 3"];
        
        for ($i=0; $i < count($table); $i++) 
        {
            $groupe = new Groupe();
            $groupe->setLibelle($table[$i]);
            $promo = $this->getReference("promo 1");
            $groupe->setPromo($promo);
            $manager->persist($groupe);

            foreach ($ as $key => $value) {
                # code...
            }
            $manager->flush();
            $this->addReference($table[$i],$groupe);
        }
    }

    public function getDependencies()
    {
        return array (PromoFixtures::class);
    }
}