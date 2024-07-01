<?php

namespace App\Repository;

use App\Entity\Clients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clients>
 *
 * @method Clients|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clients|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clients[]    findAll()
 * @method Clients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clients::class);
    }

    public function getClientCountByCompanyAndMonth($company)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT 
                DATE_TRUNC('month', c.created_at) AS month,
                COUNT(c.id) AS client_count
            FROM 
                clients c
            WHERE 
                c.company_id = :company_id
            GROUP BY 
                month
            ORDER BY 
                month ASC;
        ";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('company_id', $company->getId());
        $result = $stmt->executeQuery();

        $data = $result->fetchAllAssociative();

        // Initialiser un tableau de 12 mois à 0
        $totals = array_fill(0, 12, 0);

        foreach ($data as $row) {
            $monthIndex = (int) (new \DateTime($row['month']))->format('n') - 1; // Index 0 pour janvier, 1 pour février, etc.
            $totals[$monthIndex] = (int) $row['client_count'];
        }

        return $totals;
    }

    //    /**
    //     * @return Clients[] Returns an array of Clients objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Clients
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
