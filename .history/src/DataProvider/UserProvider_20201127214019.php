<?php

namespace App\DataProvider;


use App\Entity\User;
use Doctrine\ORM\QueryBuilder;

use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;

class UserProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{

    private $itemExtensions;
    private $managerRegistry;
    private $repo;

    private $repo_profil;
    private $pagi;

    public function __construct(ManagerRegistry $managerRegistry, PaginationExtension $pagi, iterable $itemExtensions,ProfileRepository $repo_profil , UserRepository $repo)
    {
      $this->managerRegistry = $managerRegistry;
      $this->itemExtensions = $itemExtensions;
      $this->repo = $repo;
      $this->repo_profil = $repo_profil;
      $this->pagi = $pagi;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return User::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $profil = $this->repo_profil->findOneByLibelle("APPRENANT");
        $collection = $this->repo->findByExampleField($profil->getId());


        // return $this->pagi->getCollection($collection, $resourceClass, $operationName, $context);

        // dd($collection);
        return null;
    }

}