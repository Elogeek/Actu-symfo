<?php
namespace App\Service;

/*
* First api new (mediastack)
*/
class New1Service {

    /** Search articles(5) about Japan */
    public function getData(): string {

        $queryString = http_build_query([
            // acces-key in the Api
            'access_key' => '6e6daf070179498ad3531d057e9946b0',
            // Countries
            'countries' => 'jp',
            // Limit 5 in the page
            'limit' => 5,
            'offset' => 5,
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

       return $apiResult;

    }

}