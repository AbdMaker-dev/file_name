<?php

namespace App\Repository;

use App\Entity\BriefPromotions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BriefPromotions|null find($id, $lockMode = null, $lockVersion = null)
 * @method BriefPromotions|null findOneBy(array $criteria, array $orderBy = null)
 * @method BriefPromotions[]    findAll()
 * @method BriefPromotions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BriefPromotionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BriefPromotions::class);
    }

    // /**
    //  * @return BriefPromotions[] Returns an array of BriefPromotions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findOneBySomeField($value): ?BriefPromotions
    {
        return $this->createQueryBuilder('b')
            ->join("b.promo", "p")
            ->join("b.promo", "p")
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
