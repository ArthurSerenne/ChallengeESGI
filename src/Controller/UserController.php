<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;

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

    #[Route('dashboard/user/{id}', name: 'app_user_view')]
    public function view(int $id, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $theme = $user ? $user->getTheme() : 'original';
        
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Aucun utilisateur trouvé !!');
        }

        return $this->render('backoffice/users/view.html.twig', [
            'user' => $user,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/user/{id}/edit', name: 'app_user_edit')]
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $theme = $user ? $user->getTheme() : 'original';
        
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Aucun utilisateur trouvé !!');
        }

        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user'); // Assurez-vous d'avoir une route vers la liste des clients
        }

        return $this->render('backoffice/users/edit.html.twig', [
            'userForm' => $form->createView(),
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/user/{id}/delete', name: 'app_user_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager, Request $request, User $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            try {
                $entityManager->remove($client);
                $entityManager->flush();
                $this->addFlash('success', 'L\'utilisateur a été supprimé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Impossible de supprimer cet utilisateur');
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_user');
    }
}
