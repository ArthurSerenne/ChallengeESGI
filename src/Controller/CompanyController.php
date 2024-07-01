<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Company;
use App\Form\ComptableType;
use App\Entity\User;
use App\Form\CompanyFormType;
use App\Repository\CompanyRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Repository\UserRepository;

class CompanyController extends AbstractController
{

    #[Route('/dashboard/company', name: 'app_company')]
    public function index(CompanyRepository $companyRepository, Request $request): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';
    
        return $this->render('backoffice/company/index.html.twig', [
            'companys' => $companyRepository->findAll(),
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('/company/create', name: 'app_company_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($user->getCompany()) {
            return $this->redirectToRoute('app_dashboard');
        }

        $company = new Company();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $company->setUserId($user);
            $entityManager->persist($company);

            // Ajouter le rôle ROLE_COMPANY à l'utilisateur
            $roles = $user->getRoles();
            if (!in_array('ROLE_COMPANY', $roles)) {
                $roles[] = 'ROLE_COMPANY';
                $user->setRoles($roles);
            }

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('company/create.html.twig', [
            'companyForm' => $form->createView(),
        ]);
    }


    #[Route('dashboard/company/{id}/edit', name: 'app_company_edit')]
    public function edit(int $id, Request $request, Company $company, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $company = $entityManager->getRepository(Company::class)->find($id);

        $form = $this->createForm(CompanyFormType::class, $company);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('app_company');
        }

        return $this->render('backoffice/company/edit.html.twig', [
            'form' => $form->createView(),
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/company/{id}', name: 'app_company_view')]
    public function view(int $id, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $company = $entityManager->getRepository(Company::class)->find($id);

        return $this->render('backoffice/company/view.html.twig', [
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/company/{id}/delete', name: 'app_company_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager, Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            try {
                $entityManager->remove($company);
                $entityManager->flush();
                $this->addFlash('success', 'L entreprise a été supprimée avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Impossible de supprimer cette entreprise.');
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_company');
    }

    #[Route('/dashboard/salarie', name: 'app_salarie')]
    public function createComptable(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher,  UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $this->denyAccessUnlessGranted('ROLE_COMPANY');

        $comptable = new User();
        $comptable->setCreatedAt(new \DateTime());
        $form = $this->createForm(ComptableType::class, $comptable);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comptable->setRoles(['ROLE_COMPTABLE']);
            $password = $passwordHasher->hashPassword($comptable, $comptable->getPassword());
            $comptable->setPassword($password);

            // Link the company to the new comptable user
            $comptable->addCompany($company);
            $company->addUser($comptable);

            $em->persist($comptable);
            $em->flush();

            $this->addFlash('success', 'Comptable créé avec succès');

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('backoffice/salarie/comptable.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'company' => $company,
            'theme' => $theme,
        ]);
    }
}
