<?php

namespace App\Controller;

use App\Service\NewsService;
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
     * Display article recent via M
     * @param int $max
     * @return Response
     */
    #[Route('/news', name:'recentArticles')]
    public function recentArticles(NewsService $newsService): Response {

        return $this->render('article/recentArticles.html.twig', ['apiResult' => $newsService]);

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
