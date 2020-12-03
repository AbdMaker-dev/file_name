<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use App\Entity\Promo;
use App\Entity\Referentiel;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PromoFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $promo = new Promo();
        $promo->setTitre("Promo 1")
            ->setLangue($this->getReference("FRANCAIS"))
            ->setDescription("Desc promo 1")
            ->setLieu("Dakar")
            ->setRefAgate("ref agate promo 1")
            ->setFabrique("ODC")
            ->setDateDebut(new DateTime())
            ->setDataFin(new DateTime())
            ->setReferentiel($this->getReference("referentiel 1"))
            ->addGroupe($this->getReference("Groupe principal"))
            ->addGroupe($this->getReference("Groupe 1"))
            ->setDataFin(new DateTime());

            $promo->addFormateur($this->getReference("froma"));

            $manager->persist($promo);                                                                   
            $manager->flush();
            $this->addReference("promo 1",$promo);
    }

    public function getDependencies()
    {
        return array (LangueFixtures::class, ReferentielFixtures::class, GroupeFixtures,FormateurFixtures::class);
    }
}