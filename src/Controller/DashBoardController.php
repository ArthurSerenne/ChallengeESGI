<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\FactureRepository;
use App\Repository\UserRepository;
use App\Form\ClientsFormType;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\SettingsFormType;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Service\EmailsTemplateSenderService;
use App\Entity\Clients;
use App\Entity\Facture;
use App\Entity\User;
use App\Repository\DevisRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class DashBoardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(#[CurrentUser] User $user, EntityManagerInterface $entityManager, FactureRepository $factureRepository, DevisRepository $devisRepository, ClientsRepository $clientsRepository, UserRepository $userRepository, Security $security): Response
    {
        $company = $user->getCompany();
        $user = $security->getUser();
        $theme = $user ? $user->getTheme() : 'principal';

        $factureCount = [];
        $totalCoutByMonth = [];
        $clientCountByMonth = [];
        $userCount = [];
        $companyCount = [];
        $totalAllCompany = [];
        $totalCoutAllByMonth = [];
        $userCountByMonth = [];

        // Vérifier si l'utilisateur a le rôle de comptable
        $isComptable = in_array('ROLE_COMPTABLE', $user->getRoles());
        $isAdmin = in_array('ROLE_ADMIN', $user->getRoles());
        $isCompany = in_array('ROLE_Company', $user->getRoles());

        if (!$isComptable && !$isAdmin) {
            // Récupérer les factures pour l'entreprise
            $facture = $company->getFacture();

            $clientCountByMonth = $clientsRepository->getClientCountByCompanyAndMonth($company);

            $totalCoutByMonth = $factureRepository->getTotalCoutByCompanyAndMonth($company);

            // Récupérer le total TTC des factures pour l'entreprise
            $totalCout = $factureRepository->getTotalTTCByCompany($company);

            // Récupérer le nombre de clients
            $clientCount = $entityManager->getRepository(Clients::class)->count(['company' => $company]);

            // Récupérer le nombre de factures pour l'entreprise
            $factureCount = $factureRepository->countByCompany($company);

            // Récupérer le nombre de devis
            $devisCount = $devisRepository->countByCompany($company);

        } elseif (!$isComptable && !$isCompany) {
            // Actions pour les utilisateurs qui ne sont ni entreprise ni comptable
            $facture = [];
            $factureCount = 0;
            $totalCout = 0.0;
            $clientCount = 0;
            $devisCount = 0;

            // Récupérer le nombre de clients
            $userCount = $entityManager->getRepository(User::class)->count([]);

            // Récupérer le nombre d'entreprise
            $companyCount = $entityManager->getRepository(Company::class)->count([]);

            // Récupérer le total TTC des factures de toutes les entreprises
            $totalAllCompany = $factureRepository->getTotalTTCForAllCompanies();

            // total de nouveaux utilisateurs par mois
            $userCountByMonth = $userRepository->getUserCountByMonthForAllCompanies();

            // total des transactions par mois
            $totalCoutAllByMonth = $factureRepository->getTotalCoutByMonthForAllCompanies();

        } else {
            $facture = [];
            $factureCount = 0;
            $totalCout = 0.0;
            $clientCount = 0;
            $devisCount = 0;
        }

        return $this->render('backoffice/dashboard.html.twig', [
            'factures' => $facture,
            'company' => $company,
            'user' => $user,
            'theme' => $theme,
            'clientCount' => $clientCount,
            'clientCountByMonth' => json_encode($clientCountByMonth),
            'totalCoutByMonth' => json_encode($totalCoutByMonth),
            'totalCout' => $totalCout,
            'factureCount' => $factureCount,
            'devisCount' => $devisCount,
            'userCount' => $userCount,
            'companyCount' => $companyCount,
            'totalAllCompany' => $totalAllCompany,
            'userCountByMonth' => json_encode($userCountByMonth),
            'totalCoutAllByMonth' => json_encode($totalCoutAllByMonth),
        ]);
    }

    // #[Route('/admin', name: 'app_admin')]
    // public function admin(#[CurrentUser] User $user, EntityManagerInterface $entityManager, Security $security): Response
    // {
    //     $company = $user->getCompany();
    //     $user = $security->getUser();
    //     $theme = $user ? $user->getTheme() : 'principal';

    //     // Récupérer le nombre de user
    //     $clientCount = $entityManager->getRepository(Clients::class)->count(['company' => $company]);

    //     return $this->render('backoffice/admin/admin.html.twig', [
    //         'company' => $company,
    //         'user' => $user,
    //         'theme' => $theme,
    //         'clientCount' => $clientCount,
    //     ]);
    // }

    #[Route('/dashboard/components', name: 'app_component')]
    public function component(#[CurrentUser] User $user, EntityManagerInterface $entityManager, Security $security): Response
    {
        $company = $user->getCompany();
        $user = $security->getUser();
        $theme = $user ? $user->getTheme() : 'principal';

    

        return $this->render('backoffice/components/component.html.twig', [
            'company' => $company,
            'user' => $user,
            'theme' => $theme,
        ]);
    }
}
