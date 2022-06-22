<?php
namespace App\Service;

/*
* First api new (mediastack)
*/
class New1Service {

    /** Search articles(limit 10) about Japan */
    public function getData(): array {

        $api = json_decode(file_get_contents("http://api.mediastack.com/v1/news?access_key=6e6daf070179498ad3531d057e9946b0&countries=jp&limit=10&offset=10"), true);
        foreach ($api->value as $article) {
            $arrayJp[] = [
                "author" => $article->provider->name,
                "title" => $article->title,
                "description" => $article->description,
                "image" => $article->image->url,
                "content" => $article->body
            ];
        }

        return $arrayJp;

    }

}