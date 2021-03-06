<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use App\Entity\GroupeCompetence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GroupeCompetenceFixtures extends Fixture 

    public function load(ObjectManager $manager)
    {
        $gr_competence = new GroupeCompetence();

        $gr_competence->setLibelle("gr_competence 1");

        $manager->persist($gr_competence);
        $manager->flush();
        $this->addReference("gr_competence 1",$gr_competence);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}