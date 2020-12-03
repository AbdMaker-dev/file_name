<?php

namespace App\DataFixtures;

use App\Entity\Cm;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CmFixtures extends Fixture implements DependentFixtureInterface
{

    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager)
    {
        $cm = new Cm();

        $cm->setUsername("emt_2021");
        $cm->setPassword($this->encode->encodePassword($cm,"abd_1234"));
        $cm->setNom("Tine");
        $cm->setPrenom("Moussa");
        $cm->setCni("123457982");
        $cm->setProfile($this->getReference(PrCMofileFixtures::));

        $manager->persist($cm);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array (ProfileFixtures::class);
    }
}