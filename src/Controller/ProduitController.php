<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
#[Route('dashboard/produit', name: 'app_produit_index', methods: ['GET'])]
public function index(ProduitRepository $produitRepository, Request $request): Response
{
    $searchTerm = $request->query->get('q');
    
    if ($searchTerm) {
        $produits = $produitRepository->createQueryBuilder('p')
            ->where('LOWER(p.nom) LIKE :searchTerm')
            ->setParameter('searchTerm', '%'.strtolower($searchTerm).'%')
            ->getQuery()
            ->getResult();
    } else {
        $produits = $produitRepository->findAll();
    }

    $user = $this->getUser();
    $company = $user->getCompany();
    $theme = $user ? $user->getTheme() : 'original';

    return $this->render('backoffice/produit/index.html.twig', [
        'produits' => $produits,
        'company' => $company,
        'theme' => $theme,
        'searchTerm' => $searchTerm,
    ]);
}
    #[Route('dashboard/produit/new', name: 'app_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/produit/{id}', name: 'app_produit_show', methods: ['GET'])]
    public function show(Produit $produit): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/produit/show.html.twig', [
            'produit' => $produit,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/produit/{id}/edit', name: 'app_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/produit/{id}', name: 'app_produit_delete', methods: ['POST'])]
    public function delete(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
