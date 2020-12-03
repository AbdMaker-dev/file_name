<?php
 namespace App\DataPersisters;



use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Profile;
use Doctrine\ORM\EntityManagerInterface;

class ProfilePersister implements ContextAwareDataPersisterInterface
 {
    private $_entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->_entityManager = $em;
    }
    public function supports($data, array $context = []): bool
    {
        // TODO: Implement supports() method.
        dd("oki123");
        return $data instanceof Profile;
    }

    public function persist($data, array $context = [])
    {
        // TODO: Implement persist() method.
    }

    public function remove($data, array $context = [])
    {
        dd("OKI");

        // TODO: Implement remove() method.
        $data->setDeleted(true);
        // $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }


 }