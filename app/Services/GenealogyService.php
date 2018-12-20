<?php
/**
 * Author: R.j
 * Date: 2018-12-19 14:38
 * File: GenealogyService.php
 */

namespace App\Services;


use App\Supports\UserPrefs;

class GenealogyService {

    /**
     * @param string $repNumber
     * @param int    $depth
     * @return Service
     */
    public static function getBinary(string $repNumber, int $depth = 2) {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/genealogy/{$repNumber}/binary?depth={$depth}");
    }

}