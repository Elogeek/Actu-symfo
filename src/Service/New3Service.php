<?php

namespace App\Service;

/** Last api new (newsdata.io) */

class New3Service
{
    /**
     * Search all articles about food in En /Fr
     * @return array
     */
    function getData(): array {
        $api = json_decode(file_get_contents("https://newsdata.io/api/1/news?apikey=pub_85513801750031af99934b968b9861bb6f2f&category=food&language=fr,en"), true);
        foreach ($api->value as $article) {
            $arrayFoodArticle[] = [
                "author" => $article->provider->name,
                "title" => $article->title,
                "description" => $article->description,
                "image" => $article->image->url,
                "content" => $article->body
            ];
        }
        return $arrayFoodArticle;
    }
}
