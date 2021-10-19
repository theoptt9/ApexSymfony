<?php

namespace App\Repository;

use App\Entity\TestEval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestEval|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestEval|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestEval[]    findAll()
 * @method TestEval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestEvalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestEval::class);
    }

    // /**
    //  * @return TestEval[] Returns an array of TestEval objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestEval
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
