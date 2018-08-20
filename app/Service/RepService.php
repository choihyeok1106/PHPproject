<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 11:23
 */

namespace App\Service;

use App\Supports\APIResources;

class RepService extends Service
{
    public function getLocale(){
     $this->url = APIResources::GET_LOCALE;
     $result = $this->get();
     $locale = $this->repository->convert($result->response['items'],'locale');
    }

    public function getReps(){
        $this->url = APIResources::GET_REPS;
        $result = $this->get();
        print_r($result->response); exit;
        $reps = $this->repository->convert($result->response['items'],'Rep');
    }
}