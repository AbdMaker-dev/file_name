<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CmFixture extends Fixture
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
        
        $manager->persist($apprenant);
        $manager->flush();
    }
}