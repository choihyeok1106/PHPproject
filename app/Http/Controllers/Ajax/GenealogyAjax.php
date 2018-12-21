<?php
/**
 * Author: R.j
 * Date: 2018-12-19 14:34
 * File: GenealogyAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\GenealogyCache;
use App\Cache\RepCache;
use App\Http\Controllers\Controller;
use App\Services\RepService;
use App\Supports\GenealogyNode;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class GenealogyAjax extends Controller {

    use Ajax;

    /**
     * HomeAjax constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @param string  $repNumber
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function view(Request $request, string $repNumber) {
        if ($request->ajax()) {
            $rep = RepCache::getRep($repNumber);
            return $this->ok($rep);
        }

        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $repNumber
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function binary(Request $request, string $repNumber = '') {
        if ($request->ajax()) {
            if (!$repNumber) {
                $repNumber = UserPrefs::getNumber();
            }
            $reps = GenealogyCache::getBinary($repNumber);
            return $this->ok(GenealogyNode::make()->binary($reps));
        }

        return $this->badRequest();
    }

}