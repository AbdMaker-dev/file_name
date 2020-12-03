<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use App\Entity\Promo;
use App\Entity\Referentiel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PromoFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $referentiel = new Promo();

        $referentiel->setTitre("Promo 1")
            ->setLangue($this->getReference("FRANCAIS"))
            ->setDescription("Desc promo 1")
            ->setLieu("Dakar")
            ->setRefAgate("ref agate promo 1")
            ->setFabrique("ODC")
            ->setDa("ref agate promo 1")
            ->setRefAgate("ref agate promo 1");

        $manager->persist($referentiel);
        $manager->flush();
        $this->addReference("referentiel 1",$referentiel);
    }

    public function getDependencies()
    {
        return array (CritereAdmissionFixtures::class, CritereEvaluationFixtures::class, ConpetenceFixtures::class );
    }
}