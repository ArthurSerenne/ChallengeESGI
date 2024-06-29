<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\LigneFacture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Devis;
use Dompdf\Options;
use Dompdf\Dompdf;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FactureController extends AbstractController
{
    #[Route('dashboard/facture', name: 'app_facture_index', methods: ['GET'])]
    public function index(FactureRepository $factureRepository): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $facture = $company->getFacture();
        $theme = $user ? $user->getTheme() : 'original';

        return $this->render('backoffice/facture/index.html.twig', [
            'factures' => $facture,
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
        $user = $this->getUser();
        $company = $user->getCompany();

        // Créer une nouvelle facture
        $facture = new Facture();

        $facture->setDateFacture(new \DateTime());
        $facture->setDateEcheance(new \DateTime());
        $facture->setStatutPaiement('en cours');

        // Copier les champs du devis vers la facture
        $facture->setClient($devis->getClient());
        $facture->setTotalTTC($devis->getTotalTTC());
        $facture->setDevis($devis);
        $facture->setTotalHT($devis->getTotalHT());
        $facture->setTotalTVA($devis->getTotalTVA());
        $facture->setRemise($devis->getRemise());

        foreach ($devis->getLignesDevis() as $ligneDevis) {
            $ligneFacture = new LigneFacture();
            $ligneFacture->setFacture($facture);
            $ligneFacture->setProduit($ligneDevis->getProduit());
            $ligneFacture->setQuantite($ligneDevis->getQuantite());
            $ligneFacture->setPrixHt($ligneDevis->getPrixHt());
            $ligneFacture->setPrixTtc($ligneDevis->getPrixTtc());
    
            // Ajouter la ligne de facture à la facture
            $facture->addLignesFacture($ligneFacture);
    
            // Sauvegarder la ligne de facture dans la base de données
            $entityManager->persist($ligneFacture);
        }

        // Sauvegarder la facture dans la base de données
        $facture->setCompany($company);
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

    #[Route('/generate-pdf/{id}', name: 'app_generate_pdf')]
    public function generatePdf(EntityManagerInterface $entityManager, int $id): Response
    {
        // Retrieve the invoice by its id
        $facture = $entityManager->getRepository(Facture::class)->find($id);

        if (!$facture) {
            throw $this->createNotFoundException('Aucune facture trouvée pour l\'id ' . $id);
        }

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('backoffice/pdf/pdf.html.twig', [
            'facture' => $facture,
            'client' => $facture->getClient(),
            'lignesFacture' => $facture->getLignesFacture(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);   

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("facture-{$facture->getId()}.pdf", [
            "Attachment" => true
        ]);

        return new Response("The PDF has been generated", 200);
    }
}
