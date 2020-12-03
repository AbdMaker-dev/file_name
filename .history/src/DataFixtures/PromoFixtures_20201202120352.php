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

class PromoFix extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $referentiel = new Referentiel();

        $referentiel->setLibelle("referentiel 1")
            ->setPresentation("presentation ref")
            ->setCrAdmission($this->getReference("CritereAdmission 1"))
            ->setCrEvaluation($this->getReference("CritereEvaluation 1"))
            ->addCompetence($this->getReference("conpetence 1"));

        $manager->persist($referentiel);
        $manager->flush();
        $this->addReference("referentiel 1",$referentiel);
    }

    public function getDependencies()
    {
        return array (CritereAdmissionFixtures::class, CritereEvaluationFixtures::class, ConpetenceFixtures::class );
    }
}