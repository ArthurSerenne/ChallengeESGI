<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Devis;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FactureController extends AbstractController
{
    #[Route('dashboard/facture', name: 'app_facture_index', methods: ['GET'])]
    public function index(FactureRepository $factureRepository): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/facture/index.html.twig', [
            'factures' => $factureRepository->findAll(),
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/facture/new', name: 'app_facture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/facture/new.html.twig', [
            'facture' => $facture,
            'company' => $company,
            'form' => $form,
            'theme' => $theme,
        ]);
    }

    #[Route('/dashboard/devis/{id}/generate-facture', name: 'generate_facture_from_devis')]
    public function generateFromDevis(Devis $devis, EntityManagerInterface $entityManager): RedirectResponse
    {
        // Créer une nouvelle facture
        $facture = new Facture();

        $facture->setDateFacture(new \DateTime());

        $facture->setDateEcheance(new \DateTime());

        $facture->setStatutPaiement('en cours');

        // Copier les champs du devis vers la facture
        $facture->setClient($devis->getClient());
        $facture->setTotalTTC($devis->getTotalTTC());
        $facture->setDevis($devis); // Si vous souhaitez conserver la relation devis-facture

        // Copier les autres champs nécessaires
        $facture->setTotalHT($devis->getTotalHT());
        $facture->setTotalTVA($devis->getTotalTVA());
        $facture->setRemise($devis->getRemise());

        // Sauvegarder la facture dans la base de données
        $entityManager->persist($facture);
        $entityManager->flush();

        // Rediriger vers la page des factures (ou autre)
        return $this->redirectToRoute('app_devis_index'); // Adapter la route selon vos besoins
    }

    #[Route('dashboard/facture/{id}', name: 'app_facture_show', methods: ['GET'])]
    public function show(Facture $facture): Response
    {

        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/facture/show.html.twig', [
            'facture' => $facture,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/facture/{id}/edit', name: 'app_facture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Facture $facture, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/facture/edit.html.twig', [
            'facture' => $facture,
            'company' => $company,
            'form' => $form,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/facture/{id}', name: 'app_facture_delete', methods: ['POST'])]
    public function delete(Request $request, Facture $facture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $facture->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($facture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
    }
}
