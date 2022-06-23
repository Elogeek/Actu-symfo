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
        $api = "https://newsdata.io/api/1/news?apikey=pub_85513801750031af99934b968b9861bb6f2f&category=food&language=fr,en";
        $data = file_get_contents($api);
        $dataApi = json_decode($data);
        $array = [];

        foreach ($dataApi->value as $article){
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
