<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        $apprenant = new Apprenant();

        $apprenant->setUsername("abd_2021");
        $apprenant->setPassword($this->encode->encodePassword($apprenant,"abd_1234"));
        $apprenant->setNom("Diouf");
        $apprenant->setPrenom("Alioune");
        $apprenant->setProfile($this->getReference(ProfileFixtures::APPRENANT));
        
        $manager->persist($apprenant);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (P)
    }
}