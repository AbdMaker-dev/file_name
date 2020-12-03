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

        $conpetence->set("conpetence_2021")
            ->setPassword($this->encode->encodePassword($conpetence,"conpetence_1234"))
            ->setNom("conpetence")
            ->setPrenom("conpetence-conpetence")
            ->setProfile($this->getReference("conpetence"))
            ->setEmail("conpetence@gmail.com");
        
        $manager->persist($conpetence);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}