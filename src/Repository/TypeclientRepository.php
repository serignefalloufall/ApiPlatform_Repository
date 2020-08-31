<?php

namespace App\Repository;

use App\Entity\Typeclient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typeclient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeclient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeclient[]    findAll()
 * @method Typeclient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeclientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeclient::class);
    }

    // /**
    //  * @return Typeclient[] Returns an array of Typeclient objects
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
    public function findOneBySomeField($value): ?Typeclient
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
