<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Competence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture implements DependentFixtureInterface
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        $conpetence = new Competence();

        $conpetence->setLibelle("conpetence 1")
            ->addNiveau($this->getReference("Niveau 1"))
            ->addNiveau($this->getReference("Niveau 2"))
            ->addNiveau($this->getReference("Niveau 3"));
        
        $manager->persist($conpetence);
        $manager->flush();
        $this->addReference(,$etaBrief);
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}