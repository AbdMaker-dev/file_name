<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        
        $tab = ["apprenant1@gmail.com", "apprenant2@gmail.com", "apprenant3@gmail.com", "apprenant4@gmail.com"];

        for ($i=0; $i < count($tab); $i++) { 
            $apprenant = new Apprenant();
            $apprenant->hydrate()
                ->setPassword($this->encode->encodePassword($apprenant,"apprenant_1234"))
                ->setProfile($this->getReference("APPRENANT"))
                ->setEmail($tab[$i]);
                $apprenant->
                $manager->persist($apprenant);
                $manager->flush();
                $this->addReference($tab[$i], $apprenant);
        }
    
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}