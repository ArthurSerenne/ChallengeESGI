<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;
use App\Form\SettingsFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use App\Entity\User;

class SettingsController extends AbstractController
{
    #[Route('dashboard/settings', name: 'app_settings')]
    public function settings(Request $request, EntityManagerInterface $entityManager, #[CurrentUser] User $user, Security $security)
    {

        $company = $user->getCompany();
        $user = $security->getUser();
        $theme = $user ? $user->getTheme() : 'principal';

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
            'company' => $company,
            'theme' => $theme,
        ]);
    }
}
