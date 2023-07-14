<?php

namespace App\Repository;

use App\Entity\AttributionResponsabilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttributionResponsabilite>
 *
 * @method AttributionResponsabilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributionResponsabilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributionResponsabilite[]    findAll()
 * @method AttributionResponsabilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributionResponsabiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributionResponsabilite::class);
    }

//    /**
//     * @return AttributionResponsabilite[] Returns an array of AttributionResponsabilite objects
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

//    public function findOneBySomeField($value): ?AttributionResponsabilite
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
