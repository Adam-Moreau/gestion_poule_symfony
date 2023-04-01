<?php

namespace App\Repository;

use App\Entity\Poule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Poule>
 *
 * @method Poule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poule[]    findAll()++
 * @method Poule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PouleRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 4;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poule::class);
    }

    public function add(Poule $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getPoulePaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('p')
            //->andWhere('c.conference = :conference')
            //->setParameter('conference', $conference)
            // ->orderBy('nom_poule', 'DESC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery();

        return new Paginator($query);
    }

    public function remove(Poule $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return Poule[] Returns an array of Poule objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Poule
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
