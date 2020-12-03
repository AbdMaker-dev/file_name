<?php
 namespace App\DataPersisters;



use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Cm;
use App\Entity\Formateur;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AllUserPersister implements ContextAwareDataPersisterInterface
 {
    private $_entityManager;
    private $_encode;


    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $encode)
    {
        $this->_entityManager = $em;
        $this->_encode = $encode;
    }
    public function supports($data, array $context = []): bool
    {
        // TODO: Implement supports() method.
        return $data instanceof User or  $data instanceof Admin or $data instanceof Cm or $data instanceof Formateur or $data instanceof Apprenant ;
    }

    public function persist($data, array $context = [])
    {
        // TODO: Implement persist() method.
        dd($data);
        $default_pass = $this->_encode->encodePassword($data,"passer_1234");
        $data->setPassword($default_pass);
        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }

    public function remove($data, array $context = [])
    {
        // TODO: Implement remove() method.
        $data->setDeleted(true);
        $this->_entityManager->flush();
    }

 }