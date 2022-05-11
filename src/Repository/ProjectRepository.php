<?php

namespace App\Repository;

use App\Entity\Tire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tire>
 *
 * @method Tire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tire[]    findAll()
 * @method Tire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tire::class);
    }

    /**
     * @param Tire $entity
     * @param bool $flush
     * @return void
     */
    public function add(Tire $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param Tire $entity
     * @param bool $flush
     * @return void
     */
    public function remove(Tire $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return Tire[]
     */
    public function findAllSortedByBrand(): array
    {
        return $this->findBy(array(), array('brand' => 'ASC'));
    }

    /**
     * @return void
     * @throws Exception
     */
    public function resetDatabase(): void
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            DELETE FROM tire
            ';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();
    }

    /**
     * @return Tire[] Returns an array of Project objects
     */
    public function getOrderedResult(): array
    {
        return $this->createQueryBuilder('tire')
            ->orderBy('tire.brand', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function populateDatabase(): void
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "INSERT INTO tire (brand,model,width,profile,rim_size) VALUES
                ('Kumho','Ecsta V700',225,45,17),
                ('Michelin','Pilot Sport Cup 2',225,40,18),
                ('Federal','595-RS Pro',225,45,17),
                ('Nankang','AR-1',225,45,17)";
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();
    }
}
