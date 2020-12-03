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
        $tab = ["apprenant1@gmail.com", "apprenant2@gmail.com", "apprenant3@gmail.com", "apprenant4@gmail.com"];

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

            foreach ($tab as $email) {
                $promo->add
            }

        $manager->persist($promo);
        $manager->flush();
        $this->addReference("referentiel 1",$promo);
    }

    public function getDependencies()
    {
        return array (CritereAdmissionFixtures::class, CritereEvaluationFixtures::class, ConpetenceFixtures::class );
    }
}