<?php
namespace App\Service;

class NewsAggregatorsService {
    /**
     * return all news to json
     * @return mixed
     */
    public function getAllNews(): mixed {
        $myNews = json_decode(file_get_contents(__DIR__ . "/news.json"));
        if (empty($myNews)) {
            $allNews = [];
            $service = new New1Service();
            $new1 = $service->getData();
            $service = new New2Service();
            $new2 = $service->getData();
            $service = new New3Service();
            $new3 = $service->getData();
            array_push($allNews, $new1, $new2, $new3);
            file_put_contents(__DIR__ . "/news.json", json_encode($allNews));
        }
        return json_decode(file_get_contents(__DIR__ . "/news.json"));
    }

}