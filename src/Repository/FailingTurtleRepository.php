<?php

namespace App\Repository;

use App\Entity\FailingTurtle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FailingTurtle>
 *
 * @method FailingTurtle|null find($id, $lockMode = null, $lockVersion = null)
 * @method FailingTurtle|null findOneBy(array $criteria, array $orderBy = null)
 * @method FailingTurtle[]    findAll()
 * @method FailingTurtle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FailingTurtleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FailingTurtle::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FailingTurtle $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FailingTurtle $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FailingTurtle[] Returns an array of FailingTurtle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FailingTurtle
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
