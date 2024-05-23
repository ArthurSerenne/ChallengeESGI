<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Clients;
use App\Entity\Company;
use App\Entity\User;
use App\Form\ClientsFormType;

class ClientsController extends AbstractController
{
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
}
