<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DevisController extends AbstractController
{
    #[Route('dashboard/devis', name: 'app_devis_index', methods: ['GET'])]
    public function index(Request $request, DevisRepository $devisRepository): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $order = $request->query->get('order', 'asc'); // Default order is ascending
        $devis = $devisRepository->findBy([], ['date_devis' => $order]);

        return $this->render('backoffice/devis/index.html.twig', [
            'devis' => $devis,
            'theme' => $theme,
            'company' => $company,
            'order' => $order,
        ]);
    }

    #[Route('dashboard/devis/new', name: 'app_devis_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $devis = new Devis();
        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $devis->setDateDevis(new \DateTime());

            // Calculate totalHT, totalTTC, and totalTVA if needed
            $totalHT = 0;
            $totalTTC = 0;
            $tvaRate = 0.20; // 20% VAT rate
            $remiseRate = 0.15; // 15% discount rate for totals over 1000€

            foreach ($devis->getLignesDevis() as $ligne) {
                $totalHT += $ligne->getPrixHT();
                $totalTTC += $ligne->getPrixTTC();
                $ligne->setDevis($devis); // Ensure the relation is set
            }

            // Calculer la TVA
            $totalTVA = $totalHT * $tvaRate;

            // Calculer la remise
            $remise = 0;
            if ($totalHT > 1000) {
                $remise = $totalHT * $remiseRate;
            }
 
            // Ajuster le totalTTC pour inclure la TVA et soustraire la remise
            $totalTTC = $totalHT + $totalTVA - $remise;

            $devis->setTotalHT($totalHT);
            $devis->setTotalTTC($totalTTC);
            $devis->setTotalTVA($totalTVA); // Assuming TVA is the difference between TTC and HT
            $devis->setRemise($remise);

            $entityManager->persist($devis);
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/devis/new.html.twig', [
            'devis' => $devis,
            'form' => $form,
            'theme' => $theme,
            'company' => $company,
        ]);
    }

    #[Route('dashboard/devis/{id}', name: 'app_devis_show', methods: ['GET'])]
    public function show(Devis $devis): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/devis/show.html.twig', [
            'devis' => $devis,
            'theme' => $theme,
            'company' => $company,
        ]);
    }

    #[Route('dashboard/devis/{id}/edit', name: 'app_devis_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Devis $devis, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/devis/edit.html.twig', [
            'devis' => $devis,
            'form' => $form,
            'theme' => $theme,
            'company' => $company,
        ]);
    }

    #[Route('dashboard/devis/{id}', name: 'app_devis_delete', methods: ['POST'])]
    public function delete(Request $request, Devis $devi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devi->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($devi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_devis_index', [], Response::HTTP_SEE_OTHER);
    }

    
}
