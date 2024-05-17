<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Form\ClientsFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Clients;

class DashBoardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();

        return $this->render('backoffice/base.html.twig', [
            'company' => $company,
        ]);
    }

    #[Route('dashboard/clients', name: 'app_clients')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $clients = $company->getClients();

        return $this->render('backoffice/clients/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    
    #[Route('dashboard/clients/new', name: 'app_clients_create')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();

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
        ]);
    }

    #[Route('/dashboard/components', name: 'app_dashboard_components')]
    public function components(UserRepository $userRepository): Response
    {
        return $this->render('backoffice/components.html.twig', [
            'user' => $userRepository->findAll(),
        ]);
    }
}
