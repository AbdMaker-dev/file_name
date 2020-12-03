<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        $formateur = new Formateur();

        $formateur->setUsername("fat_2021");
        $formateur->setPassword($this->encode->encodePassword($formateur,"abd_1234"));
        $formateur->setNom("Diop");
        $formateur->setPrenom("Fatoush");
        $formateur->setProfile($this->getReference(ProfileFixtures::FORMATEUR));

        $manager->persist($formateur);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}