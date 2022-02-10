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
    public function recentArticles(string $api): Response {
        return $this->render('article/recentArticles.html.twig', [
            $api = `http://api.mediastack.com/v1/news
                ?access_key = 6e6daf070179498ad3531d057e9946b0
                & sources = fr,-de,-en
                & date = 2022-02-10
                & sort = published_asc popularity
                & limit = 5`;

           'api' => $api
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
