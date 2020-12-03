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
        $ta = new GroupeTag();

        $ta->setLibelle("ta 1")
            ->addTag($this->getReference("Tag 1"))
            ->addTag($this->getReference("Tag 2"))
            ->addTag($this->getReference("Tag 3"));

        $manager->persist($ta);
        $manager->flush();
        $this->addReference("ta 1",$ta);
    }

    public function getDependencies()
    {
        return array (NiveauFixtures::class);
    }
}