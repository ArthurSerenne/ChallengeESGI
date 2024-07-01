<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('dashboard/user', name: 'app_user')]
    public function index(UserRepository $userRepository, Request $request): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';
    
    
        return $this->render('backoffice/users/index.html.twig', [
            'users' => $userRepository->findAll(),
            'company' => $company,
            'theme' => $theme,
        ]);
    }
    

    
    #[Route('dashboard/clients/new', name: 'app_user_create')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $client = new Clients();

        $client->setCreatedAt(new \DateTime());
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

    #[Route('dashboard/clients/{id}', name: 'app_user_view')]
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

    #[Route('dashboard/clients/{id}/edit', name: 'app_user_edit')]
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

    #[Route('dashboard/clients/{id}/delete', name: 'app_user_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager, Request $request, Clients $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            try {
                $entityManager->remove($client);
                $entityManager->flush();
                $this->addFlash('success', 'Le client a été supprimé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Impossible de supprimer ce client car il est rataché à un/plusieurs devis.');
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_clients');
    }
}
