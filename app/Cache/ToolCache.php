<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:34 PM
 * File: ToolCache.php
 */

namespace App\Cache;


use App\Services\FaqService;
use App\Services\ToolService;
use App\Supports\UserPrefs;

class ToolCache
{
    public static function getLibrary(){
        $key = UserPrefs::getCountryLow().":tools";
        $libraries = Cache::get($key);
        if(!$libraries){
            $service = ToolService::getLibrary();
            return Cache::set($key,$service->response());
        }
        return $libraries;
    }
}