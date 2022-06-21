<?php

namespace App\Controller;

use App\Service\New2Service;
use App\Service\New3Service;
use App\Service\NewsAggregatorsService;
use App\Service\New1Service;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articles', name:'article_')]
class ArticleController extends AbstractController {

    /**
     * Display all articles
     * @param NewsAggregatorsService $newsAggregatorsService
     * @return Response
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(NewsAggregatorsService $newsAggregatorsService): Response {
        $allNews = $newsAggregatorsService->AllNews();
        return $this->render('article/homeArticle.html.twig', [
            'news' => $allNews,
        ]);
    }

    /**
     * Display the recent articles limit 10 on the home page
     * 5 articles by api news (Mediastacks, NewsApi)
     * @param New1Service $newsService
     * @param New2Service $new2Service
     * @return Response
     */
    #[Route('/news', name:'recentArticles')]
    public function recentArticles(New1Service $newsService, New2Service $new2Service): Response {

        return $this->render('article/recentArticles.html.twig', [
            'apiResult' => $newsService,
            'articles' => $new2Service
        ]);

    }

    /**
     * Return a single article (category food)
     */
    #[Route('/new/food/{id<\d+>}', name:'single_food', methods: ['GET'])]
    public function show(int $api, int $id, New3Service $new3Service): Response
    {
        return $this->render('/article/singleArticle.html.twig', ["foodArticles" => $new3Service]);
    }

}
