<?php

namespace App\Repository;

use App\Entity\Facture;
use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Facture>
 */
class FactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facture::class);
    }
    
     // Méthode pour calculer le total TTC des factures d'une entreprise
     public function getTotalTTCByCompany(Company $company): float
     {
         return (float) $this->createQueryBuilder('f')
             ->select('SUM(f.total_ttc)')
             ->where('f.company = :company')
             ->setParameter('company', $company)
             ->getQuery()
             ->getSingleScalarResult();
     }

     public function getTotalCoutByCompanyAndMonth($company)
     {
         $conn = $this->getEntityManager()->getConnection();
     
         $sql = "
             SELECT 
                 DATE_TRUNC('month', f.date_facture) AS month,
                 SUM(f.total_ttc) AS total_amount
             FROM 
                 facture f
             WHERE 
                 f.company_id = :company_id
             GROUP BY 
                 month
             ORDER BY 
                 month ASC
         ";
         
         $stmt = $conn->prepare($sql);
        $stmt->bindValue('company_id', $company->getId());
        $result = $stmt->executeQuery();

        $data = $result->fetchAllAssociative();

        // Initialiser un tableau de 12 mois à 0
        $totals = array_fill(0, 12, 0);

        foreach ($data as $row) {
            $monthIndex = (int) date('n', strtotime($row['month'])) - 1; // Index 0 pour janvier, 1 pour février, etc.
            $totals[$monthIndex] = (float) $row['total_amount'];
        }

        return $totals;
     }
     
    // Méthode pour récupérer le total TTC pour toutes les entreprises
    public function getTotalTTCForAllCompanies()
    {
        return $this->createQueryBuilder('f')
            ->select('SUM(f.total_ttc)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getTotalCoutByMonthForAllCompanies(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT 
                DATE_TRUNC('month', f.date_facture) AS month,
                SUM(f.total_ttc) AS total_amount
            FROM 
                facture f
            GROUP BY 
                month
            ORDER BY 
                month ASC
        ";
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery();

        $data = $result->fetchAllAssociative();

        // Initialiser un tableau de 12 mois à 0
        $totals = array_fill(0, 12, 0);

        foreach ($data as $row) {
            $monthIndex = (int) date('n', strtotime($row['month'])) - 1; // Index 0 pour janvier, 1 pour février, etc.
            $totals[$monthIndex] = (float) $row['total_amount'];
        }

        return $totals;
    }
    //    /**
    //     * @return Facture[] Returns an array of Facture objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Facture
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
