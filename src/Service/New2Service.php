<?php
namespace App\Service;

/** Two api new (newsapi.org) */


class New2Service {

    function getData(): mixed {
        $api = json_decode(file_get_contents("https://newsapi.org/v2/top-headlines?sources=bbc-news&language=en&pagesize=5&sortBy=popularity&apikey=46a0ade498664b2ea8e900eb3cc7ec9d"), true);
        return $api['articles'];
    }
}