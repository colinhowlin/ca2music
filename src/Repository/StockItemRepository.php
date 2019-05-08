<?php

namespace App\Repository;

use App\Entity\StockItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StockItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockItem[]    findAll()
 * @method StockItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockItem::class);
    }

    // /**
    //  * @return StockItem[] Returns an array of StockItem objects
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
    public function findOneBySomeField($value): ?StockItem
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
