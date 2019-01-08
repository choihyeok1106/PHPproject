<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 17/12/2018
 * Time: 10:23 AM
 */

namespace App\Cache;


use App\Services\FaqService;
use App\Supports\UserPrefs;

class FaqCache
{
    public static function getFaq(){
        $key = Cache::key('item:');
        $faqs = Cache::get($key);
        if(!$faqs){
            $service = FaqService::getFaq();
            return Cache::set($key,$service->response());
        }
        return $faqs;
    }
}