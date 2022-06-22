<?php

namespace App\Service;

/** Last api new (newsdata.io) */

class New3Service
{
    /**
     * Search all articles about food in En /Fr
     * @return mixed
     */
    function getData(): mixed {
        $api = json_decode(file_get_contents("https://newsdata.io/api/1/news?apikey=pub_85513801750031af99934b968b9861bb6f2f&category=food&language=fr,en"), true);
        return $api['foodArticles'];
    }
}
