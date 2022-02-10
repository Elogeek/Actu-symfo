<?php
namespace App\Service;

/*
* First api new
*/
class NewsService {

    public function getLastArticles() {
        $queryString = http_build_query([
            // acces-key in the Api
            'access_key' => '6e6daf070179498ad3531d057e9946b0',
            // Categorie === general
            'categories' => '-general',
            // Order by more popular
            'sort' => 'popularity',
            // Langues (fr = french)
            'sources' => 'fr',
            // Order by date de publication (aujourd'hui)
            'date' => "2022-02-10",
            // Limit 10 in the page
            'limit' => 10,
        ]);

        $ch = curl_init(sprintf('%s?%s', 'https://api.mediastack.com/v1/news', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        try {
            $apiResult = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (\JsonException $e) {
            dd('e');
        }

        print_r($apiResult);

    }

}