<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 11:23
 */

namespace App\Service;

use App\Repositories\Rep;
use App\Supports\APIResources;

class RepService extends Service {

    /**
     * @return RepService
     */
    public static function Make() {
        return new RepService();
    }

    public function login($repNumber, $password) {
        $rep = [
            'id'         => '100000',
            'number'     => 'KR100000',
            'country'    => 'US',
            'first_name' => 'Evalyn',
            'last_name'  => 'Berge',
        ];

        return $rep;
    }

    /**
     * @param $repNumber
     * @return Rep
     */
    public function getRep($repNumber) {
        $this->url = APIResources::format(APIResources::GET_REP, $repNumber);
        $result    = $this->get();
        $rep       = $this->repository->convert($result->response, 'Rep');
        return $rep;
    }
}