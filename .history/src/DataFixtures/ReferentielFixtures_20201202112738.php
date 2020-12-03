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
        $referentiel = new Referentiel();

        $referentiel->setLibelle("referentiel 1")
            ->presentation("pre")
            ->addNiveau($this->getReference("Niveau 1"))
            ->addNiveau($this->getReference("Niveau 2"))
            ->addNiveau($this->getReference("Niveau 3"));

        $manager->persist($referentiel);
        $manager->flush();
        $this->addReference("referentiel 1",$referentiel);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}