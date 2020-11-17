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
        $cm = new Cm();

        $cm->setUsername("fat_2021");
        $cm->setPassword($this->encode->encodePassword($cm,"abd_1234"));
        $cm->setNom("D");
        $cm->setPrenom("Moussa");
        $cm->setCni("123457982");
        
        $manager->persist($cm);
        $manager->flush();
    }
}