<?php

namespace App\Repository;

use App\Entity\SpotType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpotType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpotType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpotType[]    findAll()
 * @method SpotType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpotTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpotType::class);
    }

    // /**
    //  * @return SpotType[] Returns an array of SpotType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpotType
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
