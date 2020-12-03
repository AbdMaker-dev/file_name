<?php

namespace App\DataProvider;

use App\Entity\User;
use Doctrine\ORM\QueryBuilder;

use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;

class UserProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{

    private $itemExtensions;
    private $managerRegistry;
    private $repo;

    private $repo_profil;

    public function __construct(ManagerRegistry $managerRegistry, iterable $itemExtensions,ProfileRepository $repo_profil , UserRepository $repo)
    {
      $this->managerRegistry = $managerRegistry;
      $this->itemExtensions = $itemExtensions;
      $this->repo = $repo;
      $this->repo_profil = $repo_profil;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return User::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $profil = $this->repo_profil->findOneByLibelle("APPRENANT");
        $collection = $this->repo->findByExampleField($profil->);



        dd($collection);

        $manager = $this->managerRegistry->getManagerForClass($resourceClass);
        dd($manager->getRepository($resourceClass));
        return null;
    }

}