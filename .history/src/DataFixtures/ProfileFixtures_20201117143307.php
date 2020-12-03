<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use App\Entity\Profile;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;

    public const CM = "cm";
    public const FORMATEUR = "formateur";
    public const APPRENANT = "apprenant";
    private $table ;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
        $this->table = ["CM","FORMATEUR","APPRENANT"];
    }

    public function load(ObjectManager $manager)
    {
        $profil = new Profile();
        
        // $manager->persist($apprenant);
        // $manager->flush();
    }
}
