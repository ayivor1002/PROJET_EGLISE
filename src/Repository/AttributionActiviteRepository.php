<?php

namespace App\Repository;

use App\Entity\AttributionActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttributionActivite>
 *
 * @method AttributionActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributionActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributionActivite[]    findAll()
 * @method AttributionActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributionActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributionActivite::class);
    }

//    /**
//     * @return AttributionActivite[] Returns an array of AttributionActivite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AttributionActivite
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
