<?php

namespace App\Repository;

use App\Entity\EtatBriefGroupes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtatBriefGroupes|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatBriefGroupes|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatBriefGroupes[]    findAll()
 * @method EtatBriefGroupes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatBriefGroupesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatBriefGroupes::class);
    }

    // /**
    //  * @return EtatBriefGroupes[] Returns an array of EtatBriefGroupes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatBriefGroupes
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
