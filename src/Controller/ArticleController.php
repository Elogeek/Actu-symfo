<?php

namespace App\Controller;

use App\Service\New3Service;
use App\Service\NewsAggregatorsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController {

    /**
     * Display all articles
     * @param NewsAggregatorsService $newsAggregatorsService
     * @return Response
     */
    #[Route('/', name: 'articles_list', methods: ['GET'])]
    public function list(NewsAggregatorsService $newsAggregatorsService): Response {

        $allNews = $newsAggregatorsService->getAllNews();
        return $this->render('article/homeArticle.html.twig', [
            'news' => $allNews,
        ]);
    }

    /**
     * Return a single article (category food)
     */
    #[Route('/new/{id<\d+>}', name:'article', methods: ['GET'])]
    public function show(int $id, New3Service $new3Service): Response
    {
        return $this->render('/article/singleArticle.html.twig', [
            "news3Services" => $new3Service
        ]);

    }

}
