<?php

namespace App\Repository;

use App\Entity\ModuleReference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ModuleReference|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleReference|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleReference[]    findAll()
 * @method ModuleReference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ModuleReference::class);
    }

//    /**
//     * @return ModuleType[] Returns an array of ModuleType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModuleType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
