<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Brief;
use App\Entity\BriefGroupe;
use App\Entity\Competence;
use App\Entity\LivrableAttenduApprenant;
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

        $table = ["Github","Figma","Trello"];

        $brief = new Brief();
        $brief->setTitre("Promo 1")
            ->setLangue($this->getReference("FRANCAIS"))
            ->setDescription("Desc promo 1")
            ->setContexte("contex brief 1")
            ->setModalitePedagogique("modalite pada brief 1")
            ->setCriterePerformance("critere de performance birf1")
            ->setModaliteEvaluation("modalite eva brief 1")
            ->setDateCreation(new DateTime())
            ->setReferentiel($this->getReference("referentiel 1"))
            ->addNiveauCompetences($this->getReference("Niveau 1"))->addNiveauCompetences($this->getReference("Niveau 2"))
            ->addTags($this->getReference("Tag 1"))->addTags($this->getReference("Tag 2"))
            ->setFormateur($this->getReference("forma"))
            //->addLivrableAttendu($this->getReference("Github"))->addLivrableAttendu($this->getReference("Figma"))
            ->setEtatBrief($this->getReference("VALIDE"))
            ->addPromo($this->getReference("promo 1"));

        $brief_group = new BriefGroupe();
        $groupe = $this->getReference("Groupe 1");
        $brief_group->addGroupe($groupe);
        $brief->addGroupe($brief_group);

        foreach ($table as $livAtt) {
            $livAtt = $this->getReference($livAtt);
            $brief->addLivrableAttendu($livAtt);
            foreach ($groupe->getApprenants() as $appre) {
                $livAttApp = new LivrableAttenduApprenant();
                $livAttApp->addApprenant($a)
            }
        }

            $manager->persist($brief);                                                                   
            $manager->flush();
            $this->addReference("brief 1",$brief);
    }

    public function getDependencies()
    {
        return array (
            LangueFixtures::class,
            EtatBriefFixtures::class,
            RessourceFixtures::class, 
            GroupeFixtures::class,
            PromoFixtures::class,
            ReferentielFixtures::class, 
            NiveauFixtures::class, 
            TagFixtures::class, 
            FormateurFixtures::class);
    }
}