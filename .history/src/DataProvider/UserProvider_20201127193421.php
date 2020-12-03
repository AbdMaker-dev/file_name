<?php

namespace App\DataProvider;

use App\Entity\User;
use Doctrine\ORM\QueryBuilder;

use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use App\Repository\UserRepository;

class UserProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{

    private $itemExtensions;
    private $managerRegistry;
    private $repo;

    public function __construct(ManagerRegistry $managerRegistry, iterable $itemExtensions, UserRepository $repo)
    {
      $this->managerRegistry = $managerRegistry;
      $this->itemExtensions = $itemExtensions;
      $this->repo = 
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return User::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $manager = $this->managerRegistry->getManagerForClass($resourceClass);
        dd($manager->getRepository($resourceClass));
        return null;
    }

}