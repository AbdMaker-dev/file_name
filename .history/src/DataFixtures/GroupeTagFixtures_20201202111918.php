<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Gr extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $conpetence = new Competence();

        $conpetence->setLibelle("conpetence 1")
            ->addNiveau($this->getReference("Niveau 1"))
            ->addNiveau($this->getReference("Niveau 2"))
            ->addNiveau($this->getReference("Niveau 3"));

        $manager->persist($conpetence);
        $manager->flush();
        $this->addReference("conpetence 1",$conpetence);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}