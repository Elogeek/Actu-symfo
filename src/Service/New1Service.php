<?php
namespace App\Service;

/*
* First api new (mediastack)
*/
class New1Service {

    /** Search articles(limit 10) about Japan */
    public function getData(): array {

        $api = "http://api.mediastack.com/v1/news?access_key=6e6daf070179498ad3531d057e9946b0&countries=jp&limit=10&offset=10";
        $data = file_get_contents($api);
        $dataApi = json_decode($data);
        $array = [];

        if (!empty($dataApi->value)) {
            foreach ($dataApi->value as $article) {
                $array[] = [
                    "title" => $article->title,
                    "author"=>$article->author,
                    "url"=>$article->url,
                    "image"=>$article->image,
                    "description"=>$article->description,
                    "published"=>$article->published,
                ];
            }
        }

        return $array;
    }

}