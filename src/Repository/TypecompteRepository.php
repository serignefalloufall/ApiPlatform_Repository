<?php

namespace App\Repository;

use App\Entity\Typecompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typecompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typecompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typecompte[]    findAll()
 * @method Typecompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypecompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typecompte::class);
    }

    // /**
    //  * @return Typecompte[] Returns an array of Typecompte objects
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
    public function findOneBySomeField($value): ?Typecompte
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
