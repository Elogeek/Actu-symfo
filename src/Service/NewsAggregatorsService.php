<?php
namespace App\Service;

class NewsAggregatorsService {
    /**
     * return all news to array
     * @return mixed
     */
    public function getAllNews(): array {

        $new1 = (new New1Service())->getData();
        //$new2 = (new New2Service())->getData();
        //$new3 = (new New3Service())->getData();

       return array_merge($new1);
    }

}