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
    #[Route('/blog', name: 'app_blog')]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $categoriesRepository = $entityManagerInterface->getRepository(Categories::class);

        $categories = [];
        foreach ($categoriesRepository->findAll() as $categorie) {
            if (count($categories) === 0) {
                $categories[] = 'Tous';
            }
            $categories[] = $categorie->getName();
        }
        return $this->render('blog/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/blog/{filter}', name: 'app_blog_filter')]
    public function showArticles(string $filter, EntityManagerInterface $entityManagerInterface)
    {
        $postRepository = $entityManagerInterface->getRepository(Posts::class);
        $posts = [];
        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
