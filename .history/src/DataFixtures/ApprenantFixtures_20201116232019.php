<?php

use App\Entity\Apprenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApprenantFixtures extends Fixture
{

    private $en
    public function load(ObjectManager $manager)
    {
        $apprenant = new Apprenant();

        $apprenant->setUsername("abd_2020");
        $apprenant->setPassword()
    }
}