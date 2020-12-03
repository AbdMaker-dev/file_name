<?php
 namespace App\DataPersisters;



use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Cm;
use App\Entity\Formateur;
use Doctrine\ORM\EntityManagerInterface;

class AllUserPersister implements ContextAwareDataPersisterInterface
 {
    private $_entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->_entityManager = $em;
    }
    public function supports($data, array $context = []): bool
    {
        // TODO: Implement supports() method.
        return $data instanceof Admin or $data instanceof Cm or $data instanceof Formateur or $data instanceof Apprenant ;
    }

    public function persist($data, array $context = [])
    {
        
        // TODO: Implement persist() method.
        // dd($data);
        $default_
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