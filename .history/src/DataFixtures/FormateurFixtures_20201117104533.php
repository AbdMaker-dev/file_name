<?php

namespace App\DataFixtures;

use App\Entity\Cm;
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
        $for = new for();

        $for->setUsername("fat_2021");
        $for->setPassword($this->encode->encodePassword($for,"abd_1234"));
        $for->setNom("Diop");
        $for->setPrenom("Fatoush");
        
        $manager->persist($for);
        $manager->flush();
    }
}