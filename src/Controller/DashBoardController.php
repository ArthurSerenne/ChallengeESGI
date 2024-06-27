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
use App\Entity\Clients;
use App\Entity\Facture;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class DashBoardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(#[CurrentUser] User $user, EntityManagerInterface $entityManager, FactureRepository $factureRepository,ClientsRepository $clientsRepository, Security $security): Response
    {
        $company = $user->getCompany();
        $user = $security->getUser();
        $theme = $user ? $user->getTheme() : 'principal';

        // Récupérer le nombre de clients
        $clientCount = $entityManager->getRepository(Clients::class)->count(['company' => $company]);

        // Récupérer le nombre de factures
        $factureCount = $factureRepository->count([]);

        // Récupérer le coût total des factures
        $factures = $factureRepository->findAll();
        $totalCout = 0.0;

        return $this->render('backoffice/dashboard.html.twig', [
            'factures' => $factureRepository->findAll(),
            'company' => $company,
            'user' => $user,
            'theme' => $theme,
            'clientCount' => $clientCount,
            'totalCout' => $totalCout,
            'factureCount' => $factureCount,
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(#[CurrentUser] User $user, EntityManagerInterface $entityManager, Security $security): Response
    {
        $company = $user->getCompany();
        $user = $security->getUser();
        $theme = $user ? $user->getTheme() : 'principal';

        // Récupérer le nombre de clients
        $clientCount = $entityManager->getRepository(Clients::class)->count(['company' => $company]);

        return $this->render('backoffice/admin/admin.html.twig', [
            'company' => $company,
            'user' => $user,
            'theme' => $theme,
            'clientCount' => $clientCount,
        ]);
    }

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
