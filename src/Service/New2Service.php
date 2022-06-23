<?php
namespace App\Service;

/** Two api new (newsapi.org) */

class New2Service
{
    /**
     * Search for the most popular articles(limit5) in En
     */
    function getData(): array {
        $json ="https://newsapi.org/v2/everything?sources=bbc-news&language=en&pagesize=5&sortBy=popularity&apiKey=46a0ade498664b2ea8e900eb3cc7ec9d";
        $data = file_get_contents($json);
        $dataApi = json_decode($data);
        $array = [];

        foreach ($dataApi->news as $article) {
            $array[] = [
                "title" => $article->title,
                "author"=>$article->author,
                "url"=>$article->url,
                "image"=>$article->image,
                "description"=>$article->description,
                "published"=>$article->published,
            ];
        }

        return $array;
    }

}