<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articles', name:'article_')]
class ArticleController extends AbstractController {

    /**
     * Display all articles
     * @return Response
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(): Response {
        return $this->render('article/homeArticle.html.twig');
    }

    /**
     * Display article recent
     * @param int $max
     * @return Response
     */
    #[Route('/news', name:'recentArticles')]
    public function recentArticles(int $max = 5): Response {
        return $this->render('article/recentArticles.html.twig', [
            'max' => $max
        ]);
    }

    /**
     * Return a single article
     */
    #[Route('/show', name: 'show', methods: ['GET'])]
    public function show(): Response
    {
        return $this->render('/article/singleArticle.html.twig');
    }

}
