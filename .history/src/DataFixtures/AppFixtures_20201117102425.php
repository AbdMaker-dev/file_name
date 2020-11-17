<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        $apprenant = new Apprenant();

        $apprenant->setUsername("abd_2020");
        $apprenant->setPassword($this->encode->encodePassword($apprenant,"abd_1234"));
        $apprenant->setNom("Diouf");
        $apprenant->setPrenom("Alioune");
        
        $manager->persist($apprenant);
        $manager->flush();
    }
}
