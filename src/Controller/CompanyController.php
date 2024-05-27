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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class CompanyController extends AbstractController
{
    #[Route('/company/create', name: 'app_company')]
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

    #[Route('/dashboard/salarie', name: 'app_salarie')]
    public function createComptable(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $this->denyAccessUnlessGranted('ROLE_COMPANY');

        $comptable = new User();
        $form = $this->createForm(ComptableType::class, $comptable);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comptable->setRoles(['ROLE_COMPTABLE']);
            $password = $passwordHasher->hashPassword($comptable, $comptable->getPassword());
            $comptable->setPassword($password);

            $em->persist($comptable);
            $em->flush();

            $this->addFlash('success', 'Comptable créé avec succès');

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('backoffice/salarie/comptable.html.twig', [
            'form' => $form->createView(),
            'theme' => $theme,
        ]);
    }
}
