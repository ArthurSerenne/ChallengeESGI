<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Form\ClientsFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\SettingsFormType;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Clients;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class DashBoardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(#[CurrentUser] User $user): Response
    {
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/dashboard.html.twig', [
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/clients', name: 'app_clients')]
    public function index(): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $clients = $company->getClients();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/clients/index.html.twig', [
            'clients' => $clients,
            'theme' => $theme,
        ]);
    }

    
    #[Route('dashboard/clients/new', name: 'app_clients_create')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $client = new Clients();
        $form = $this->createForm(ClientsFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setCompany($company);
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('app_clients');
        }

        return $this->render('backoffice/clients/create.html.twig', [
            'clientForm' => $form->createView(),
            'theme' => $theme,
        ]);
    }



    #[Route('dashboard/settings', name: 'app_settings')]
    public function settings(Request $request, EntityManagerInterface $entityManager, #[CurrentUser] User $user)
    {

        $form = $this->createForm(SettingsFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $theme = $form->get('theme')->getData();
            $user->setTheme($theme);
            
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('backoffice/settings/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
