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
        $admin = new Admin();
        $tab = ["appre"]

        $admin->setUsername("admin_2021")
            ->setPassword($this->encode->encodePassword($admin,"apprenant_1234"))
            ->setNom("Admin")
            ->setPrenom("Admin-Admin")
            ->setProfile($this->getReference("APPRENANT"))
            ->setEmail("admin@gmail.com");
        
        $manager->persist($admin);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}