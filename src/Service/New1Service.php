<?php
namespace App\Service;

/*
* First api new (mediastack)
*/
class New1Service {

    /** Search articles(limit 10) about Japan */
    public function getData(): array {

        /* Generate URL encoded query string */
        $request = http_build_query([
            'access_key' => '6e6daf070179498ad3531d057e9946b0',
            'countries' => 'jp',
            'limit' => '10',
            'offset' => '10',
        ]);

        /* Session initialization(cURL) */
        $key = curl_init(sprintf('%s?%s', 'https://api.mediastack.com/v1/news', $request));
        /* Session options configs */
        curl_setopt($key, CURLOPT_RETURNTRANSFER, true);
        /* Session Execution */
        $json = curl_exec($key);
        /* Closing the session */
        curl_close($key);
        $array = [];
        $dataApi = json_decode($json, true);

        if (!empty($dataApi->value)) {
            foreach ($dataApi->value as $article) {
                $array[] = [
                    "title" => $article->title,
                    "author"=>$article->author,
                    "url"=>$article->url,
                    "image"=>$article->image,
                    "description"=>$article->description,
                    "published_at"=>$article->published,
                ];
            }
        }

        return $array;

    }

}