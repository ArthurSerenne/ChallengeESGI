<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    #[Route('dashboard/category', name: 'app_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, Request $request): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $category = $company->getCategories();
        $theme = $user ? $user->getTheme() : 'original';

        $searchTerm = $request->query->get('q');
    
    if ($searchTerm) {
        $categories = $categoryRepository->createQueryBuilder('c')
            ->where('LOWER(c.Category) LIKE :searchTerm')
            ->setParameter('searchTerm', '%'.strtolower($searchTerm).'%')
            ->getQuery()
            ->getResult();
    } else {
        $categories = $categoryRepository->findAll();
    }

        return $this->render('backoffice/category/index.html.twig', [
            'categoriess' => $categories,
            'categories' => $category,
            'company' => $company,
            'theme' => $theme,
            'searchTerm' => $searchTerm,
        ]);
    }

    #[Route('dashboard/category/new', name: 'app_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setCompany($company);
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/category/new.html.twig', [
            'category' => $category,
            'company' => $company,
            'form' => $form,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/category/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original'; 

        return $this->render('backoffice/category/show.html.twig', [
            'category' => $category,
            'company' => $company,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/category/{id}/edit', name: 'app_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $company = $user->getCompany();
        $theme = $user ? $user->getTheme() : 'original';

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backoffice/category/edit.html.twig', [
            'category' => $category,
            'company' => $company,
            'form' => $form,
            'theme' => $theme,
        ]);
    }

    #[Route('dashboard/category/{id}', name: 'app_category_delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            try {
                $entityManager->remove($category);
                $entityManager->flush();
                $this->addFlash('success', 'La catégorie a été supprimée avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Impossible de supprimer cette catégorie car elle contient des produits.');
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
