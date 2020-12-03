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
        $gr_tag = new GroupeTag();

        $gr_tag->setLibelle("gr_tag 1")
            ->addTag($this->getReference("Tag 1"))
            ->addTag($this->getReference("Tag 2"))
            ->addTag($this->getReference("Tag 3"));

        $manager->persist($gr_tag);
        $manager->flush();
        $this->addReference("gr_tag 1",$gr_tag);
    }

    public function getDependencies()
    {
        return array (Tag::class);
    }
}