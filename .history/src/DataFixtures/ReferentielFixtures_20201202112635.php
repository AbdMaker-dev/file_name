<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use App\Entity\Referentiel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ReferentielFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $referen = new Referentiel();

        $referen->setLibelle("referen 1")
            ->addNiveau($this->getReference("Niveau 1"))
            ->addNiveau($this->getReference("Niveau 2"))
            ->addNiveau($this->getReference("Niveau 3"));

        $manager->persist($referen);
        $manager->flush();
        $this->addReference("referen 1",$referen);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}