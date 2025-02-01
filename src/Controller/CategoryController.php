<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/categorie/{slug}', name: 'app_category')]
    public function index($slug, CategoryRepository $categoryRepository): Response
    {
        // dd($slug);
        //Ce repesitory me permet de faire une requete en bdd et avec la methode je cherche les bonnes données
        $category = $categoryRepository->findOneByslug($slug);
        // dd($category);

        // j'ouvre une connection avec ma BDD
        // Connecte avec la table category



        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }
}
