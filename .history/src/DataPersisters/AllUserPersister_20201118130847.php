<?php
 namespace App\DataPersisters;



use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Cm;
use App\Entity\Profile;
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
        return $data instanceof Profile or $data instanceof Cm;
    }

    public function persist($data, array $context = [])
    {
        
        // TODO: Implement persist() method.
        // dd($data);
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