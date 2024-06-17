<?php

namespace App\Controller;

use App\Entity\LigneDevis;
use App\Form\LigneDevisType;
use App\Repository\LigneDevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/devis')]
class LigneDevisController extends AbstractController
{
    #[Route('/', name: 'app_ligne_devis_index', methods: ['GET'])]
    public function index(LigneDevisRepository $ligneDevisRepository): Response
    {
        return $this->render('ligne_devis/index.html.twig', [
            'ligne_devis' => $ligneDevisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_devis_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneDevi = new LigneDevis();
        $form = $this->createForm(LigneDevisType::class, $ligneDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneDevi);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis/new.html.twig', [
            'ligne_devi' => $ligneDevi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_show', methods: ['GET'])]
    public function show(LigneDevis $ligneDevi): Response
    {
        return $this->render('ligne_devis/show.html.twig', [
            'ligne_devi' => $ligneDevi,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_devis_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneDevis $ligneDevi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneDevisType::class, $ligneDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis/edit.html.twig', [
            'ligne_devi' => $ligneDevi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_delete', methods: ['POST'])]
    public function delete(Request $request, LigneDevis $ligneDevi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDevi->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($ligneDevi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_devis_index', [], Response::HTTP_SEE_OTHER);
    }
}
