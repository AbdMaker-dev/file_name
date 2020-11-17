<?php

use App\Entity\Apprenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApprenantFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $apprenant = new Apprenant()
    }
}