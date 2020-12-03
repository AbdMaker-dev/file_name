<?php

namespace App\DataFixtures;

use App\Entity\Admin;
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
        $apprenats = new Apprenant();
        
        $tab = ["apprenant1@gmail.com", "apprenant2@gmail.com", "apprenant3@gmail.com", "apprenant4@gmail.com"];

        $apprenats->hydrate()
            ->setPassword($this->encode->encodePassword($apprenats,"apprenant_1234"))
            ->setNom("apprenats")
            ->setPrenom("apprenats-apprenats")
            ->setProfile($this->getReference("APPRENANT"))
            ->setEmail("apprenats@gmail.com");
        
        $manager->persist($apprenats);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}