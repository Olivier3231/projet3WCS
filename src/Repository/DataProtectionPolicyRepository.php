<?php

namespace App\Repository;

use App\Entity\DataProtectionPolicy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DataProtectionPolicy|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataProtectionPolicy|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataProtectionPolicy[]    findAll()
 * @method DataProtectionPolicy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataProtectionPolicyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataProtectionPolicy::class);
    }

    // /**
    //  * @return DataProtectionPolicy[] Returns an array of DataProtectionPolicy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataProtectionPolicy
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
