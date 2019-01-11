<?php
/**
 * Author: R.j
 * Date: 2018-12-19 14:34
 * File: GenealogyAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\GenealogyCache;
use App\Cache\RepCache;
use App\Supports\GenealogyNode;
use App\Supports\UserPrefs;

class GenealogyAjax extends AjaxController {

    /**
     * @param string $repNumber
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function view(string $repNumber) {
        $rep = RepCache::getRep($repNumber);
        return $this->ok($rep);
    }

    /**
     * @param string $repNumber
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function binary(string $repNumber = '') {
        if (!$repNumber) {
            $repNumber = UserPrefs::number();
        }
        $reps = GenealogyCache::getBinary($repNumber);
        return $this->ok(GenealogyNode::make()->binary($reps));
    }

}