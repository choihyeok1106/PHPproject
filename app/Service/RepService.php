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
    public function getRep($repNumber)
    {
        $this->url = APIResources::format(APIResources::GET_REP, $repNumber);
        $result = $this->get();
        $rep = $this->repository->convert($result->response, 'Rep');
        return $rep;
    }
}