<?php

namespace App\Repository;

use App\Entity\Debtor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Debtor>
 *
 * @method Debtor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debtor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debtor[]    findAll()
 * @method Debtor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebtorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Debtor::class);
    }

//    /**
//     * @return Debtor[] Returns an array of Debtor objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Debtor
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
