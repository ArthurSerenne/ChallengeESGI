<?php

namespace App\Controller;

use App\Entity\LigneFacture;
use App\Form\LigneFactureType;
use App\Repository\LigneFactureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/facture')]
class LigneFactureController extends AbstractController
{
    #[Route('/', name: 'app_ligne_facture_index', methods: ['GET'])]
    public function index(LigneFactureRepository $ligneFactureRepository): Response
    {
        return $this->render('ligne_facture/index.html.twig', [
            'ligne_factures' => $ligneFactureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_facture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFacture = new LigneFacture();
        $form = $this->createForm(LigneFactureType::class, $ligneFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFacture);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture/new.html.twig', [
            'ligne_facture' => $ligneFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_show', methods: ['GET'])]
    public function show(LigneFacture $ligneFacture): Response
    {
        return $this->render('ligne_facture/show.html.twig', [
            'ligne_facture' => $ligneFacture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_facture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFacture $ligneFacture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFactureType::class, $ligneFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture/edit.html.twig', [
            'ligne_facture' => $ligneFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFacture $ligneFacture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFacture->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($ligneFacture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_facture_index', [], Response::HTTP_SEE_OTHER);
    }
}
