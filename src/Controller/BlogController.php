<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Paragraphs;
use App\Entity\Posts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blog', requirements: ['_locale' => 'en|es|fr'], name: 'blog_')]
class BlogController extends AbstractController
{
    #[Route('/{filter}', name: 'all_articles')]
    public function showArticles(string $filter, Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $categoriesRepository = $entityManagerInterface->getRepository(Categories::class);
        $categories = $categoriesRepository->findAll();

        $filters = [];
        $posts = [];
        foreach ($categoriesRepository->findAll() as $categorie) {
            if (count($filters) === 0) {
                $filters[] = 'Tous';
            }
            $filters[] = $categorie->getName();
        }
        $request->query->all();

        $postRepository = $entityManagerInterface->getRepository(Posts::class);

        if($request->query->all() !== 'Tous' && $filter !== 'Tous') { 
            $category = $entityManagerInterface->getRepository(Categories::class);
            $category = $category->findOneBy(['name' => $filter]);
            $posts = $postRepository->findByCategory($category);
        }   else {
            $posts = $postRepository->findAll();
        }
        return $this->render('blog/index.html.twig', [
            'filters' => $filters,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    #[Route('/${slug}/{id<\d+>}',  name: 'details_article')]
    public function showOneArticle(int $id, EntityManagerInterface $entityManagerInterface) 
    {
        $postRepository = $entityManagerInterface->getRepository(Posts::class);
        $post = $postRepository->findBy(['id'=> $id])[0];

        // 3 posts random
        $postRepository = $entityManagerInterface->getRepository(Posts::class);

        $posts = $postRepository->findAllExceptThis($post);

        $paragraphRepository = $entityManagerInterface->getRepository(Paragraphs::class);
        $paragraphs = $paragraphRepository->findAllParagraphsOfPost($post);

        return $this->render('blog/details.html.twig', [
            'post' => $post,
            'paragraphs' => $paragraphs,
            'posts' => array_slice($posts, 0, 3)
        ]);
    }
}
