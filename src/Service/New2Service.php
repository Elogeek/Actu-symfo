<?php
namespace App\Service;

/** Two api new (newsapi.org) */

class New2Service
{

    /**
     * Search for the most popular articles(limit5) in En
     */
    function getData(): array {
        $api = json_decode(file_get_contents("https://newsapi.org/v2/everything?sources=bbc-news&language=en&pagesize=5&sortBy=popularity&apiKey=46a0ade498664b2ea8e900eb3cc7ec9d"), true);
        foreach ($api->articles as $article) {
            $apiArray[] = [
                "author" => $article->author,
                "title" => $article->title,
                "description" => $article->description,
                "image" => $article->urlToImage,
                "content" => $article->content
            ];
        }

        return $apiArray;
    }
}