<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Brief;
use App\Entity\Competence;
use App\Entity\Promo;
use App\Entity\Referentiel;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BriefFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $tab = ["apprenant1@gmail.com", "apprenant2@gmail.com", "apprenant3@gmail.com", "apprenant4@gmail.com"];

        $promo = new Brief();
        $promo->setTitre("Promo 1")
            ->setLangue($this->getReference("FRANCAIS"))
            ->setDescription("Desc promo 1")
            ->setContexte("contex brief 1")
            ->setModalitePedagogique("modalite pada brief 1")
            ->setRessource($this->getReference("google.com"))
            ->setCriterePerformance("critere de performance birf1")
            ->setModalitePedagogique("modalite peda brief 1")
            ->setDateCreation(new DateTime())
            ->setReferentiel($this->getReference("referentiel 1"))
            ->addNiveauCompetences($this->getReference("Groupe 1"))
            ->setDataFin(new DateTime());
            foreach ($tab as $email) {
                $promo->addApprenant($this->getReference($email));
            }
            $promo->addFormateur($this->getReference("froma"));

            $manager->persist($promo);                                                                   
            $manager->flush();
            $this->addReference("promo 1",$promo);
    }

    public function getDependencies()
    {
        return array (LangueFixtures::class, ReferentielFixtures::class, GroupeFixtures::class, ApprenantFixtures::class, FormateurFixtures::class);
    }
}