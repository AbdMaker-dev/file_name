<?php

namespace App\DataProvider;


use App\Entity\User;
use Doctrine\ORM\QueryBuilder;

use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryResultCollectionExtensionInterface;

class UserProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $managerRegistry;
    private $pagi;
    private $context;
    private $repo;
    private $repo_profil;
    

    public function __construct(ManagerRegistry $managerRegistry, PaginationExtension $pagi, iterable $itemExtensions,ProfileRepository $repo_profil , UserRepository $repo)
    {
      $this->managerRegistry = $managerRegistry;
      $this->pagi = $pagi;
      $this->repo = $repo;
      $this->repo_profil = $repo_profil;

    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        $this->context = $context;
        return true;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {

        $queryBuilder = $this->managerRegistry->getManagerForClass($resourceClass)
            ->getRepository($resourceClass)
            ->createQueryBuilder("o");

        if ($resourceClass == "App\Entity\GroupeCompetence") {
            $queryBuilder->join("o.competences", "c")
                ->addSelect("c")
                ->andWhere('c.deleted = :val2')
                ->setParameter('val2', false);
        }

        if ($resourceClass == "App\Entity\User") {
            $profil = $this->repo_profil->findOneByLibelle("APPRENANT");
            $queryBuilder->andWhere('o.profile != :val2')
                ->setParameter('val2', $profil->getId());
        }


        $queryBuilder->andWhere("o.deleted = :val1")
            ->setParameter('val1', false);
            
        $this->pagi->applyToCollection($queryBuilder, new QueryNameGenerator(), $resourceClass, $operationName, $this->context);

        if ($this->pagi instanceof QueryResultCollectionExtensionInterface && $this->pagi->supportsResult($resourceClass, $operationName, $this->context)) {
                return $this->pagi->getResult($queryBuilder, $resourceClass, $operationName, $this->context);
            }

        return $queryBuilder->getQuery()->getResult();



        // $queryBuilder = $this->managerRegistry->getManagerForClass($resourceClass)
        //     ->getRepository($resourceClass)
        //     ->createQueryBuilder("o")
        //     ->join("o.competences", "c")
        //     ->addSelect("c")
        //     ->andWhere("o.deleted = :val1")
        //     ->andWhere('c.deleted = :val2')
        //     ->setParameter('val1', false)
        //     ->setParameter('val2', false);

        // $this->pagi->applyToCollection($queryBuilder, new QueryNameGenerator(), $resourceClass, $operationName, $this->context);

        // if ($this->pagi instanceof QueryResultCollectionExtensionInterface && $this->pagi->supportsResult($resourceClass, $operationName, $this->context)) {
        //         return $this->pagi->getResult($queryBuilder, $resourceClass, $operationName, $this->context);
        //     }

        // return $queryBuilder->getQuery()->getResult();

// -------------------------------------------------------------------------------------------------------------------

        // $profil = $this->repo_profil->findOneByLibelle("APPRENANT");
        // $queryBuilder = $this->managerRegistry->getManagerForClass($resourceClass)
        //     ->getRepository($resourceClass)
        //     ->createQueryBuilder("KAKA")
        //     ->andWhere("KAKA.deleted = :val1")
        //     ->andWhere('KAKA.profile != :val2')
        //     ->setParameter('val1', false)
        //     ->setParameter('val2', $profil->getId());

        // $this->pagi->applyToCollection($queryBuilder, new QueryNameGenerator(), $resourceClass, $operationName, $this->context);

        // if ($this->pagi instanceof QueryResultCollectionExtensionInterface && $this->pagi->supportsResult($resourceClass, $operationName, $this->context)) {
        //         return $this->pagi->getResult($queryBuilder, $resourceClass, $operationName, $this->context);
        //     }

        // return $queryBuilder->getQuery()->getResult();
    }

}