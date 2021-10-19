<?php

namespace App\Repository;

use App\Entity\WikiQuiMarche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WikiQuiMarche|null find($id, $lockMode = null, $lockVersion = null)
 * @method WikiQuiMarche|null findOneBy(array $criteria, array $orderBy = null)
 * @method WikiQuiMarche[]    findAll()
 * @method WikiQuiMarche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WikiQuiMarcheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WikiQuiMarche::class);
    }

    // /**
    //  * @return WikiQuiMarche[] Returns an array of WikiQuiMarche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WikiQuiMarche
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
