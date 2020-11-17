<?php

use App\Entity\Apprenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApprenantFixtures extends Fixture
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface )
    {
        
    }
    public function load(ObjectManager $manager)
    {
        $apprenant = new Apprenant();

        $apprenant->setUsername("abd_2020");
        $apprenant->setPassword()
    }
}