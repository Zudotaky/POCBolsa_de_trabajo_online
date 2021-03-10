<?php

namespace App\Repository;

use App\Entity\OfertaLaboral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfertaLaboral|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfertaLaboral|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfertaLaboral[]    findAll()
 * @method OfertaLaboral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfertaLaboralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfertaLaboral::class);
    }

    // /**
    //  * @return OfertaLaboral[] Returns an array of OfertaLaboral objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfertaLaboral
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
