<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConstructionController extends AbstractController
{
    #[Route('dashboard/construction', name: 'app_construction')]
    public function index(): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';


        return $this->render('backoffice/construction/index.html.twig', [
            'controller_name' => 'ConstructionController',
            'company' => $company,
            'theme' => $theme,
        ]);
    }
}
