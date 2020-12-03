<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use App\Entity\GroupeTag;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GroupeTagFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $conpetence = new GroupeTag();

        $conpetence->setLibelle("conpetence 1")
            ->addTag($this->getReference("Niveau 1"))
            ->addTag($this->getReference("Niveau 2"))
            ->addTag($this->getReference("Niveau 3"));

        $manager->persist($conpetence);
        $manager->flush();
        $this->addReference("conpetence 1",$conpetence);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}