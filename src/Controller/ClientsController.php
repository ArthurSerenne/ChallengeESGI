<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Clients;
use App\Entity\Company;
use App\Entity\User;
use App\Form\ClientsFormType;
use Knp\Component\Pager\PaginatorInterface;

class ClientsController extends AbstractController
{
    #[Route('dashboard/clients', name: 'app_clients')]
    public function index(ClientsRepository $clientsRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $clients = $company->getClients();
        $theme = $user ? $user->getTheme() : 'original';

        // Pagination
        $queryBuilder = $clientsRepository->createQueryBuilder('c');
        $pagination = $paginator->paginate(
            $queryBuilder, // Requête pour les données
            $request->query->getInt('page', 1), // Numéro de page
            8 // Limite par page
        );

        return $this->render('backoffice/clients/index.html.twig', [
            'company' => $company,
            'clients' => $clients,
            'clients' => $pagination,
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
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/clients/{id}', name: 'app_clients_view')]
    public function view(int $id, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';
        
        $client = $entityManager->getRepository(Clients::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException('Aucun client trouvé !!');
        }

        return $this->render('backoffice/clients/view.html.twig', [
            'client' => $client,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/clients/{id}/edit', name: 'app_clients_edit')]
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';
        
        $client = $entityManager->getRepository(Clients::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException('Client not found');
        }

        $form = $this->createForm(ClientsFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_clients'); // Assurez-vous d'avoir une route vers la liste des clients
        }

        return $this->render('backoffice/clients/edit.html.twig', [
            'clientForm' => $form->createView(),
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/clients/{id}/delete', name: 'app_clients_delete')]
    public function delete(int $id, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';
        
        $client = $entityManager->getRepository(Clients::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException('Aucun client trouvé !!');
        }

        $entityManager->remove($client);
        $entityManager->flush();

        return $this->redirectToRoute('app_clients');
    }
}
