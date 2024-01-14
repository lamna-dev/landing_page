<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Posts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog/{filter}', name: 'app_blog')]
    public function showArticles(string $filter, EntityManagerInterface $entityManagerInterface)
    {
        $categoriesRepository = $entityManagerInterface->getRepository(Categories::class);
        $categories = $categoriesRepository->findAll();

        $filters = [];
        foreach ($categoriesRepository->findAll() as $categorie) {
            if (count($filters) === 0) {
                $filters[] = 'Tous';
            }
            $filters[] = $categorie->getName();
        }
        $postRepository = $entityManagerInterface->getRepository(Posts::class);
        $posts = $postRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'filters' => $filters,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
